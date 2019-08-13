const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');

const port = process.argv.slice(2)[0];
const app = express();
app.use(bodyParser.json());

app.get('/rastreador', (req, res) => {

    const clienteId = parseInt(req.params[0]);
    const clienteEncontrado = listaClientes.find(subject => subject.id === clienteId);

    if (clienteEncontrado) {
        res.status(202).header({Location: `http://localhost:${port}/cliente/${clienteEncontrado.id}`}).send(clienteEncontrado);
    } else {
        console.log(`Cliente no encontrado.`);
        res.status(404).send();
    }

});

console.log(`Servicio de clientes escuchando en el puerto ${port}`);
app.listen(port);
