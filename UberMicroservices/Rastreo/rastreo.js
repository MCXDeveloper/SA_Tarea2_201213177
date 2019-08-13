const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');

const port = process.argv.slice(2)[0];
const app = express();
app.use(bodyParser.json());

app.get('/rastreador', (req, res) => {

    const clienteId = parseInt(req.query['id_cliente']);
    const pilotoId = parseInt(req.query['id_piloto']);
    const nombrePiloto = req.query['nombre_piloto'];

    const response = {
        status: 'Correct!',
        message: 'Asignación de viaje realizada correctamente.  Su piloto es: ' + nombrePiloto
    };

    res.status(202).json(response);

});

console.log(`Servicio de clientes escuchando en el puerto ${port}`);
app.listen(port);
