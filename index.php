<!DOCTYPE html>
<html>
    <head>
        <title>JUEGO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="./SeleccionDeModo.php" method="post">
                <p>Selecciona a que quieres jugar:</p>
                <input type="radio" id="male" name="modalidad" value="maquina">
                <label for="maquina">La maquina adivina tu numero.</label><br>
                <input type="radio" id="female" name="modalidad" value="jugador">
                <label for="jugador">Tu adivinas el numero de la maquina</label><br>
                <br>
                <input type="radio" id="male" name="nivel" value="10" required>
                <label for="uno">NIVEL FÁCIL (1-10)</label><br>
                <input type="radio" id="female" name="nivel" value="50" required>
                <label for="dos">NIVEL MEDIO (1-50)</label><br>
                <input type="radio" id="female" name="nivel" value= "100" required>
                <label for="tres">NIVEL DIFÍCIL (1-100)</label><br><br><br>
                <input type="submit" value="JUGAR">
         </form> 
        <form action="./PartidasAnteriores.php" method="post">
            <input type="submit" value="VER PARTIDAS ANTERIORES">
        </form>
        <form action="./Credits.txt" method="post">
            <input type="submit" value="CREDITOS">
        </form>
    </body>
</html>
