// Import required modules
const express = require('express');
const mongoose = require('mongoose');
const path = require('path');
const bodyParser = require('body-parser');
const cors = require('cors');

// Initialize Express app
const app = express();
const port = 5000;

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public'))); // Serve static files

// MongoDB connection string (Replace with your MongoDB connection string)
const mongoURI = 'YOUR_MONGODB_CONNECTION_STRING';

// Connect to MongoDB
mongoose.connect(mongoURI, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('MongoDB connected'))
  .catch(err => console.error('MongoDB connection error:', err));

// Define Booking schema and model
const bookingSchema = new mongoose.Schema({
  name: String,
  email: String,
  mobile: String,
  service: String,
  date: String,
  timeslot: String,
  state: String,
  district: String,
  street: String,
  colony: String,
  pincode: String
});

const Booking = mongoose.model('Booking', bookingSchema);

// Serve the HTML file
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// POST endpoint to handle form submissions
app.post('/api/bookings', async (req, res) => {
  try {
    const booking = new Booking(req.body);
    await booking.save();
    res.status(201).send('Booking successful');
  } catch (error) {
    res.status(500).send('Error saving booking');
  }
});

// Start server
app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
