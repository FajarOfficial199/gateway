const express = require('express');
const bodyParser = require('body-parser');
const app = express();

app.use(bodyParser.json());

app.get('/api', (req, res) => {
    results = {
        nama: 'candra'
    }
    res.send(results);
    console.log(results);
});

app.listen(3000, () => {
    console.log('Server started on port 3000...');
});