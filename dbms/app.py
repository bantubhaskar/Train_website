from flask import Flask, request, jsonify
from chatterbot import ChatBot
from chatterbot.trainers import ChatterBotCorpusTrainer

app = Flask(__name__)

# Create a chatbot instance
chatbot = ChatBot('RailwayBot')
trainer = ChatterBotCorpusTrainer(chatbot)
# Train the chatbot on English language data
trainer.train('chatterbot.corpus.english')

@app.route('/get_response', methods=['POST'])
def get_response():
    user_message = request.json['user_message']
    # Get AI response
    ai_response = str(chatbot.get_response(user_message))
    return jsonify({'ai_response': ai_response})

if __name__ == '__main__':
    app.run(debug=True)
