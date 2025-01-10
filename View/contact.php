 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         
         *{text-align:center;}
         #contact{
             float: left;
             margin: auto;

         }
         #contacter{
            padding-right: 20%;
         }
         #contac{
            display: flex;
           top: 3%;
         }
         a{
            text-decoration: none;
         }
         @media  (max-width: 772px) {
            #contacter ,#contact{
            padding: 3% 15%;
         }
         #contac{
            display: block;
           top: 3%;
         }
         #contact{
            float: clear;
             margin: auto;

         }
         }

        

    </style>
 </head>
 <body>
<?php include_once __DIR__ . '/header.php';?>

        <section id="main">
            <h1>  Contactez-nous</h1>
            <iframe width="100%"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50793.44818541798!2d9.826484667955778!3d37.2811362865433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e31e4db2105f13%3A0xf44361a00609c69e!2sBizerte!5e0!3m2!1sfr!2stn!4v1606849957614!5m2!1sfr!2stn" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>    
            <p>Merci de compléter le formulaire suivant pour nous contacter. Tous les champs de ce formulaire sont requis.</p>
            
            <div id="contac">
           <div id="contact" >
            <i class="fa fa-phone" aria-hidden="true">+21625879526</i><br>
            <i class="fa fa-map-marker" aria-hidden="true">Tunisie,Bizerte</i><br>
            <br><i class="fa fa-envelope-o" aria-hidden="true"><a href="mailto:samehjemai98@gmail.com">samehjemai98@gmail.com</a></i>
           </div>
           <div id="contacter">
           <form action="mailto:samehjemai98@gmail" method="post">
                <table>
                    <tr>
                        <th><label for="lastname">Votre Nom</label></th>
                        <td><input type="text" name="lastname" id="lastname" required></td>
                    </tr>
                    <tr>
                        <th><label for="mail">Votre e-mail</label></th>
                        <td><input type="email" name="mail" id="mail" required></td>
                    </tr>
                    <tr>
                        <th><label for="message">Votre message</label></th>
                        <td><textarea name="message" id="message" cols="20" rows="5" required></textarea></td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <input type="submit" value="Envoyer">
                        </th>
                    </tr>
                </table>
            </form>
           </div>
           </div>
    </section>

    <?php include_once __DIR__ . '/footer.html';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     
 </body>
 </html>