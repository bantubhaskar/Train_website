import React, { useState } from 'react';

const NumberGuessingGame = () => {
  const [targetNumber, setTargetNumber] = useState(generateRandomNumber());
  const [userGuess, setUserGuess] = useState('');
  const [message, setMessage] = useState('');
  const [attempts, setAttempts] = useState(0);

  function generateRandomNumber() {
    return Math.floor(Math.random() * 100) + 1; // Generates a random number between 1 and 100
  }

  const handleInputChange = (event) => {
    setUserGuess(event.target.value);
  };

  const handleGuess = () => {
    const guess = parseInt(userGuess, 10);

    if (isNaN(guess) || guess < 1 || guess > 100) {
      setMessage('Please enter a valid number between 1 and 100.');
      return;
    }

    setAttempts(attempts + 1);

    if (guess === targetNumber) {
      setMessage(`Congratulations! You guessed the number in ${attempts} attempts.`);
    } else {
      setMessage(guess < targetNumber ? 'Try a higher number.' : 'Try a lower number.');
    }
  };

  const handleReset = () => {
    setTargetNumber(generateRandomNumber());
    setUserGuess('');
    setMessage('');
    setAttempts(0);
  };

  return (
    <div>
      <h1>Number Guessing Game</h1>
      <p>{message}</p>
      {!message && (
        <div>
          <input
            type="number"
            value={userGuess}
            onChange={handleInputChange}
            placeholder="Enter your guess"
          />
          <button onClick={handleGuess}>Guess</button>
        </div>
      )}
      <button onClick={handleReset}>Reset Game</button>
    </div>
  );
};

export default NumberGuessingGame;
