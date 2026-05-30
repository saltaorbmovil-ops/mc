const express = require("express");
const fs = require("fs");
const path = require("path");

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "index.html"));
});

app.post("/guardar", (req, res) => {
  const { input1, input2, input3, input4, input5, input6 } = req.body;

  const registro = `${new Date().toISOString()} | ${input1} | ${input2} | ${input3} | ${input4} | ${input5} | ${input6}\n`;

  fs.appendFileSync("registros.txt", registro);

  res.send(`
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>No disponible</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          background: #f2f2f2;
          height: 100vh;
          margin: 0;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .cartel {
          background: white;
          padding: 40px;
          border-radius: 12px;
          box-shadow: 0 0 15px rgba(0,0,0,.15);
          text-align: center;
        }
      </style>
    </head>
    <body>
      <div class="cartel">
        <h1>NO DISPONIBLE</h1>
      </div>
    </body>
    </html>
  `);
});

const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
  console.log("Servidor corriendo en puerto " + PORT);
});
