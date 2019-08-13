const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');

const port = process.argv.slice(2)[0];
const app = express();
app.use(bodyParser.json());

const listaPilotos = [
    {
        id: 1,
        displayName: 'Tyrone Gonzalez',
        busy: true,
        location: [75, 10]
    },
    {
        id: 2,
        displayName: 'Lou Fresco',
        busy: false,
        location: [50, 25]
    },
    {
        id: 3,
        displayName: 'Afromack',
        busy: false,
        location: [35, 15]
    },
    {
        id: 4,
        displayName: 'Apache',
        busy: false,
        location: [5, 9]
    }
];

app.get('/piloto/**', (req, res) => {

    const pilotoId = parseInt(req.params[0]);
    const pilotoEncontrado = listaPilotos.find(subject => subject.id === clienteId);

    if (pilotoEncontrado) {
        res.status(202).header({Location: `http://localhost:${port}/piloto/${pilotoEncontrado.id}`}).send(pilotoEncontrado);
    } else {
        console.log(`Piloto no encontrado.`);
        res.status(404).send();
    }

});

console.log(`Servicio de pilotos escuchando en el puerto ${port}`);
app.listen(port);
