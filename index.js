const express= require('express');
const bodyParser=require('body-parser');
const jwt = require('jsonwebtoken');


const api=express();
api.use(express.static(__dirname+'/src'))

api.listen(3000,()=>{
    console.log("API up and running!");
});

app.post('/generate-token', (req, res) => {
  const userId = req.body.userId; // Assume userId is sent in the request body
  const secretKey = 'JWT_SECRET'; // Replace with a strong secret key

  const token = jwt.sign({ userId }, secretKey, { expiresIn: '1h' });
  res.json({ token });
});

api.post('/add',(req,res)=>{
    console.log(req.body);
    res.send('It works!');
})