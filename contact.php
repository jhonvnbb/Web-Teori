<?php 
	include 'header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<style>
    .body-container {
        display: flex; /*mengatur teks di sebelah kanan gambar*/
        align-items: center;
        /* margin: 50px; */
    }
    
    .text-container{
        margin-bottom: 100px;
    }

    .image-toko{
        margin-top: 30px;
        margin-left: 70px;
        margin-bottom: 70px;
    }

    h1 {
        font-size: 3em;
        margin-bottom: 40px;
    }

    .text-container p {
        font-size: 20px;
        margin: 0px;
    }

    .contact-detail a {
        color: blue;
        text-decoration: none;
    }

    .form-wrapper {
        max-width: 850px; /*ngatur mau selebar mana, atau segede mana*/
        margin: auto;
        padding: 20px;
    }

    .form-container {
        margin-top: 50px;
    }

    .form-container input, .form-container textarea {
        width: 100%;
        padding: 20px;
        margin-bottom: 20px; /*mengatur jarak antar kotaknya ke bawah*/
        border: 1px solid;
        font-size: 16px;
    }

    .form-container .form-row {
        display: flex; /* menjadikan nama dan emal menjadi satu baris, karena nama dan email itu masuk class form-container bagian form-row */
        justify-content: space-between; /*biar yang satu baris itu ngambil jarak tengah*/
    }

    .form-container .form-row input {
        width: 49%; /*ngatur dari space betweenya mau berapa*/
    }
    
    .form-container button {
        margin-top: 15px;
        margin-bottom: 15px;
        background-color: black;
        color: white;
        padding: 12px 32px;  /*ke atas - ke samping*/
        border: none;
        cursor: pointer;
        font-size: 18px;
    }
</style>
<body>
    <div class="body-container">
        <div class="image-toko">
            <img src="image/home/tokojam.jpg" style="width: 85%; height: 500px;">
        </div>
        <div class="text-container">
            <h1>Zovy Watch</h1>
            <p>Ruko BKP Blok Z</p>
            <p>Jalan Kesuksesan No.1</p>
            <p>Kemiling Raya, 35153</p>
            <p>Bandar Lampung, Indonesia</p>
            <div class="contact-detail">
                <p>Telp. +62 21 1234 5678</p>
                <p>WA. <a href="tel:+6289644514022">+62 896 3345 1402</a></p>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2025359329705!2d105.20476654096659!3d-5.3860698806936185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40d00d0bdee97d%3A0xe6144b680292b622!2sJl.%20Persada%20II%2C%20Kemiling%20Permai%2C%20Kec.%20Kemiling%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sen!2sid!4v1716701771471!5m2!1sen!2sid" width="1500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="form-wrapper">
        <div class="form-container">
            <form action="submit_form.php" method="post">
                <div class="form-row">
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email *" required>
                </div>
                <input type="text" name="phone" placeholder="Phone number">
                <textarea name="comment" rows="4" placeholder="Comment"></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php 
	include 'footer.php';
 ?>