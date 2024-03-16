<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(photo-1442570468985-f63ed5de9086.avif);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #2e24bd;
            color: white;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Train Ticket Booking</h1>
    </header>

    <main>
        <form action="booking.php" method="post">
            <label for="start_station">Start Station:</label>
            <select name="start_station" required>
                <option value="Secunderabad">Secunderabad</option>
                <option value="Mahabubnagar">Mahabubnagar</option>
                <option value="Tandur">Tandur</option>
                <option value="kachiguda">kachiguda</option>
                <option value="Nampally">Nampally</option>
                <option value="Gadwal">Gadwal</option>

                <option value="Rachiur">Rachiur</option>
                <option value="kurnool">kurnool</option>

                <option value="Nizambad">Nizambad</option>
                <option value="Mumbai">Mumbai</option>

                <option value="Delhi">Delhi</option>
                <option value="Bengal">Bengal</option>

                
                <!-- Add more stations as needed -->
            </select>

            <label for="destination_station">Destination Station:</label>
            <select name="destination_station" required>
                <option value="Tandur">Tandur</option>
                <option value="Mahabubnagar">Mahabubnagar</option>
                <option value="Secunderabad">Secunderabad</option>
                <option value="kachiguda">kachiguda</option>
                <option value="Nampally">Nampally</option>
                <option value="Gadwal">Gadwal</option>
                <option value="Rachiur">Rachiur</option>
                <option value="kurnool">kurnool</option>
                <option value="Nizambad">Nizambad</option>
                <option value="Delhi">Delhi</option>
                <option value="Bengal">Bengal</option>
                <option value="kasi">kasi</option>




                <!-- Add more stations as needed -->
            </select>

            <label for="train_id">Train ID:</label>
            <input type="text" name="train_id" required>

            <label for="train_name">Train Name:</label>
            <select name="train_name" required>
                <option value="Charminar Express 12759 ">Charminar Express 12759</option>
                <option value="Vskp Hyb Special (08563)	
                ">Vskp Hyb Special (08563)	
            </option>
                <option value="Hyb Vskp Special (08564)	
                ">Hyb Vskp Special (08564)	
            </option>
                <option value="Sc Nlr Special (07121)	
                ">Sc Nlr Special (07121)	
            </option>
                <option value="Hyb Kop Special (07143)	
                ">Hyb Kop Special (07143)	
            </option>
                <option value="Charminar Express (12760)
                ">Charminar Express (12760)
            </option>
                <option value="Hyb Bpa Express (17011)	
                ">Hyb Bpa Express (17011)	
            </option>
                <option value="Bpa Hyb Express (17012)	
                ">Bpa Hyb Express (17012)	
            </option>
                <option value="Hyb Bpa Special (07011)	
                ">Hyb Bpa Special (07011)	
            </option>
                <option value="Hyb Aii Special (07020)	
                ">Hyb Aii Special (07020)	
            </option>
                <option value="Bidr Hyb Express (17009)	
                ">Bidr Hyb Express (17009)	
            </option>
                <option value="Hyb Ru Special (07429)	
                ">Hyb Ru Special (07429)	
            </option>
                <option value="Ru Hyb Special (07430)	
                ">Ru Hyb Special (07430)	
            </option>
                <option value="Hyb Qln Special (07107)	
                ">Hyb Qln Special (07107)	
            </option>
                <option value="Ald Hyb Special (07092)	
                ">Ald Hyb Special (07092)	
            </option>
                <option value="Hyb Kop Special (01032)
                ">Hyb Kop Special (01032)
            </option>
                <option value="Chennai Express (12604)
                ">Chennai Express (12604)
            </option>
                <!-- Add more stations as needed -->
            </select>


            <label for="seat_number">Seat Number:</label>
            <select name="seat_number" required>
<?php

 <option value="1">1</option>
?>


               <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
                <option value="60">60</option>
                <option value="61">61</option>

                <option value="62">62</option>
                <option value="63">63</option>
                <option value="64">64</option>
                <option value="65">65</option>
                <option value="66">66</option>
                <option value="67">67</option>
                <option value="68">68</option>
                <option value="69">69</option>

                <option value="70">70</option>
                <option value="71">71</option>
                <option value="72">72</option>
                <option value="73">73</option>
                <option value="74">74</option>
                <option value="75">75</option>

            </select>
            <label for="ac_non_ac">AC or Non-AC:</label>
            <select name="ac_non_ac" required>
                <option value="ac">AC</option>
                <option value="non_ac">Non-AC</option>
            </select>
            <label for="booking_date">date</label>
            <input type="date" name="booking_date" required>

            <label for="passenger_name">Passenger Name:</label>
            <input type="text" name="passenger_name" required>

            <label for="passenger_mobile_number">Passenger Mobile:</label>
            <input type="tel" name="passenger_mobile_number" required>

            <label for="passenger_email">Passenger Email:</label>
            <input type="email" name="passenger_email" required>

            <label for="passenger_address">Passenger Address:</label>
            <textarea name="passenger_address" rows="4" required></textarea>

            <button type="submit">Book Ticket</button>
        </form>
    </main>
</body>
</html>
