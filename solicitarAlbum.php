<!-- CABECERA -->
    <?php require("includes/headerLogged.html"); ?>
<!-- FIN CABECERA -->       

    <main>
        <form class="card" action="albumSolicitado.php" method="POST">
            Descripción: <br> 
            <p class="anuncio"> 
                Este texto describe el funcionamiento de cómo se debe solicitar un álbum. En primer lugar,
                el nombre y apellidos son obligatorios para el envío postal y personalización del álbum. Las tarifas dependen
                del número de páginas, de la resolución y del color de la portada. El título del álbum tiene un máximo de 200
                carácteres y es obligatorio. El texto adicional será una dedicatoria o una descripción del álbum. El correo que
                se debe poner es el del destinatario para posibles notificaciones. En impresión a color seleccione la casilla
                si desea que se imprima a color o dejela deseleccionada para imprimir el álbum en blanco y negro.
            </p>
            Tarifas:
            <br>
            <table style="width:30%">
                <tr>
                    <th>Concepto</th>
                    <th>Tarifa</th>
                </tr>
                <tr>
                    <td>&lt; 5 Páginas</td>
                    <td>0.10 € por página</td>
                </tr>
                <tr>
                    <td>Entre 5 y 10 páginas</td>
                    <td>0.08 € por página</td>
                </tr>
                <tr>
                    <td>> 11 páginas</td>
                    <td>0.07 € por página</td>
                </tr>
                <tr>
                    <td>Blanco y Negro</td>
                    <td>0 €</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>0.05 € por foto</td>
                </tr>
                <tr>
                    <td>Resolución > 300 DPI</td>
                    <td>0.02 € por foto</td>
                </tr>
            </table>
            <br>
            * Campos obligatorios
            <br>
            <label>
                Nombre
                <input type="text" name="nombre" maxlength="200" required placeholder="Enter your Name">*
            </label>
            <label>
                Apellidos
                <input type="text" name="apellidos" maxlength="200" required placeholder="Enter your surname">*<br>
            </label>
            <label>
                Título delálbum
                <input type="text" name="album" maxlength="200" required placeholder="200 carácteres">*<br>
            </label>
            <label>
                Texto adicional
                <textarea rows="3" cols="30" name="textadic" maxlength="4000" placeholder="Enter your text here"></textarea><br>
            </label>
            <label>
                Correo electrónico:
                <input type="email" name="email" required placeholder="Enter your e-mail" maxlength="200">*<br>
            </label>
            <fieldset>
            <legend>Dirección postal*</legend>
                <label>
                    Calle
                    <input type="text" name="calle" placeholder="Calle" required>
                </label>
                <label>
                    Número
                    <input type="text" name="numero" placeholder="Número" required>
                </label>
                <label>
                    Puerta
                    <input type="text" name="puerta" placeholder="Puerta" required><br>
                </label>
                <label>
                    Ciudad
                    <input type="text" name="ciudad" placeholder="Ciudad" required>
                </label>
                <label>
                    Provincia
                    <input type="text" name="provincia" placeholder="Provincia" required>
                </label>
                <label>
                    Código Postal
                    <input type="number" name="cpostal" placeholder="Cod.Postal" required><br>
                </label>
            </fieldset>
            <label>
                Color de portada
                <input type="color" name="favcolor"><br>
            </label>
            <label>
                Número de copias
                <input type="number" name="copias" min="1" value="1" required>*<br>
            </label>
            <label>
                Resolución de fotos
                <input type="number" name="resfoto" min="150" max="900" step="150" value="150"><br>
            </label>
            <label>
                Álbum a escoger
                <select name="Álbumes">
                    <option value="1">Mis álbumes</option>
                    <option value="2">Álbum X</option>
                    <option value="3">Álmbum Y</option>
                </select>
            </label>*<br>
            <label>
                Fecha de recepción:<br>
                <input type="date" name="fecentrega"><br>
            </label>

            <label>
                <input type="checkbox" name="your-group" value="unit-in-group" />Impresión a color<br><br>
            </label>
            <input type="submit" value="Enviar"><br><br><br><br><br>
        </form>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->