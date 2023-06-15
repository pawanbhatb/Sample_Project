// Import required modules
const express = require('express');
const mysql = require('mysql');

// Create a MySQL connection pool
const pool = mysql.createPool({
  host: '127.0.0.1',
  user: 'root',
  password: 'password',
  database: 'sample_pproject',
});

// Create an Express application
const app = express();

// Configure middleware to parse the request body
app.use(express.urlencoded({ extended: true }));

// Handle the form submission
app.post('/', (req, res) => {
  // Retrieve form data from request body
  const { make, model, year, vin, license, owner, contact } = req.body;

  // Create the SQL query
  const query = `
    INSERT INTO vehicles (make, model, year)
    VALUES (?, ?, ?)
  `;

  // Execute the SQL query
  pool.query(query, [make, model, year], (error, results) => {
    if (error) {
      console.error('Error inserting data:', error);
      res.status(500).send('Error inserting data into database');
    } else {
      console.log('Data inserted successfully');
      res.status(200).send('Data inserted successfully');
    }
  });
});

// Start the server
app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
