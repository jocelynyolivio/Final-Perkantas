<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #FFFADD;
        }

        .navbar-brand:hover {
            transform: scale(1.1);
        }

        .navbar {
            background-color: #FFCC70;
        }

        .nav-link {
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            text-decoration: none;
            color: #031D44;
            padding: 20px 0px;
            margin-right: 20px;
            display: inline-block;
            position: relative;
            opacity: 0.75;
        }

        .nav-link:hover {
            opacity: 1;
        }

        .nav-link::before {
            transition: 300ms;
            height: 2px;
            content: "";
            position: absolute;
            background-color: red;
        }

        .nav-link-img {
            color: #031D44;
            padding-top: 15px;
            margin-right: 20px;
            display: inline-block;
            position: relative;
            opacity: 0.75;
        }

        .nav-link-img:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .nav-link-ltr::before {
            width: 0%;
            bottom: 10px;
        }

        .nav-link-ltr:hover::before {
            width: 100%;
        }

        #dropdown-products {
            display: none;
        }

        #menu-products:hover #dropdown-products {
            display: block;
        }

        .carousel {
            width: 60vw;
        }

        .dropdown-item.active {
            font-weight: bold !important;
        }

        .visimisi {
            width: 100%;
            height: 180px;
        }

        .vm {
            padding-bottom: 10px;
        }

        .motto {
            padding-top: 50px;

        }

        .artikel {
            text-align: center;
        }

        .isipengantar {
            /* max-width: 60vw; */
            /* border: 2px solid black; */
            padding: 2%;
            display: flex;
            justify-content: space-between;
        }

        p {
            font-size: 18px;
        }

        .card-title {
            padding-top: 2vh;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        .card-text {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php include "navbar.php" ?>

    <div class="pengantar p-5 col-12">
        <h3 class="artikel"><b>A R T I C L E</b></h3>


        <div class="isipengantar">
            <!-- <h2 class="blockquote text-center">Pengantar</h2> -->
            <div class="col-md-12">
                <p style="text-align:center;">Konsultasikan permasalahan pribadimu secara online di tengah masa karantina di rumah. <br> Pulih Asih melayani konsultasi online melalui media aplikasi Whatsapp maupun telepon dengan biaya sebagai berikut:</p>
                <p style="text-align:center;">Whatsapp Call: Rp. 200.000/jam</p>
                <p style="text-align:center;">Whatsapp Chat: Rp. 200.000/jam</p>
                <p style="text-align:center;">Telepon (Non-Whatsapp): Rp. 150.000/jam</p>
                <p style="text-align:center;">Panggilan dilakukan oleh klien.</p>
                <p style="text-align:center;">Informasi dan pendaftaran dapat menghubungi Adinda: 085791152570 (WA saja).</p>
            </div>
        </div>


        <div class="d-flex flex-row col-12 justify-content-center flex-wrap">
            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal1">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Kecemasan: Apa Itu?</h5>
                    <p class="card-text">August 29th 2023</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                    <!-- <a href="detik.com" class="position-absolute bottom-0 end-0 p-3">Selengkapnya ></a> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Spinfinity Stainless Steel Wind Spinners</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Spinfinity Stainless Steel Wind Spinners</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary">
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Mutiara Kehidupan</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Mencegah anak Kecanduan Gadget</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Tips Psikologi</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary">
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Mutiara Kehidupan</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                </div>
            </div>

            <div class="card col-3 p-2 m-4">
                <div class="card-body" data-bs-toggle="modal" data-bs-target="#modal2">
                    <img src="assets/dummy.png" class="card-img-top" alt="...">
                    <h5 class="card-title">Hampir Sejuta Orang Bunuh Diri Per Tahun</h5>
                    <p class="card-text">xxx</p>
                    <!-- <button type="button" class="btn btn-primary" >
                            penjelasan
                        </button> -->
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apa itu Kecemasan?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Hidup manusia dibagi ke dalam tiga dimensi waktu: masa lalu, masa kini dan masa depan. Masa lalu sudah berlalu dan masa depan belum tiba, kehidupan manusia yang sesungguhnya adalah pada masa kini.</p>

                        <p>Kesehatan mental adalah kebiasaan berpikir dan mengalami pada masa kini. Jika pikiran dan pengalaman terlalu berkaitan dengan suatu peristiwa yang telah berlalu atau peristiwa di masa depan yang belum tiba, maka gangguan kesehatan mental akan muncul. Gangguan kesehatan mental berawal dari gangguan emosi, kemudian berpengaruh terhadap perilaku, tubuh/kesehatan fisik dan pikiran.</p>

                        <p>Gangguan kesehatan mental dapat berkaitan dengan masa lalu, masa kini maupun masa depan. Gangguan kesehatan mental yang berkaitan dengan masa lalu adalah trauma atau kepahitan hati, gangguan kesehatan mental yang berkaitan dengan masa kini adalah stress atau depresi dan gangguan kesehatan mental yang berkaitan dengan masa depan disebut dengan kecemasan.</p>

                        <p>Misalnya: saat kita sedang berhadapan dengan anjing yang menggonggong. Peristiwa yang sedang terjadi pada masa kini adalah berhadapan dengan anjing yang menggonggong. Namun pada umumnya pikiran kita dengan cepat langsung “menyabotase“ sehingga pikiran kita langsung memikirkan bahwa anjing ini pasti akan menggigit kita sebentar lagi.</p>

                        <p>Kesimpulan bahwa anjing tersebut pasti menggigit didapatkan dari kesimpulan anjing yang sedang menggonggong. Padahal anjing yang menggonggong belum tentu menggigit, bisa jadi anjing tersebut hanya berani menggonggong tapi takut untuk menggigit.</p>

                        <p>Kesimpulan dari “sabotase“ pikiran tersebut yang membuat kita langsung menjadi cemas ketika menghadapi anjing padahal kesimpulan kita belum terjadi dan masih merupakan kemungkinan di depan (baca: masa depan).</p>

                        <p>Pada umumnya kesimpulan kita tentang masa depan dipengaruhi oleh pengalaman masa lalu. Peristiwa masa lalu langsung melompat ke masa depan dan dijadikan sebagai suatu kepastian. Dengan menggunakan contoh di atas, maka kita bisa menganalisa tentang gangguan kecemasan, yaitu faktor-faktor yang bisa membuat seseorang mengalami kecemasan.</p>

                        <p>Timbulnya kecemasan ini sangat berkaitan dengan fokus seseorang. Seseorang yang terlalu berfokus kepada peristiwa di masa depan yang belum terjadi akan menimbulkan kecemasan.</p>

                        <p>Peristiwa di masa depan yang belum tentu terjadi seringkali menyerap energi pikiran kita secara berlebihan. Hal ini terjadi karena pikiran menguatirkan sesuatu yang belum pasti terjadi. Kekuatiran akan masa depan yang belum pasti terjadi ini menguras daya pikir hingga hampir seratus persen dan tidak menyediakan ruang berpikir tentang masa kini. Prosentase pikiran yang banyak terserap kepada masa depan itulah yang disebut dengan fokus.</p>

                        <p>Hal ini dapat diatasi dengan membagi fokus pikiran secara seimbang baik masa depan maupun masa kini. Akan lebih baik lagi jika fokus pikiran prosentasenya lebih banyak di masa kini. Pikiran di masa kini tersebut adalah dengan melakukan antisipasi atau alternatif pemecahan masalah sehingga sebisa mungkin memperkecil akibat negatif di masa mendatang. Dengan memperkecil akibat yang mungkin bisa terjadi di masa depan akan mengurangi tingkat kecemasan seseorang.</p>

                        <p> Demikianlah penjelasan mengenai faktor kecemasan dan cara penanganannya. Namun masih ada beberapa penjelasan yang lain mengenai terjadinya kecemasan dan cara penanganannya yang akan dipaparkan pada edisi berikutnya.</p>

                        <p>Sumber : lalala </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Spinfinity On The App Store</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        The sky is the limit when it comes to how much money you can earn. Pala Casino is licensed by the New Jersey Department of Gaming Enforcement.
                        Stars Group includes the existence of additional user-created accounts, Stars Group will close additional accounts without notice and will be able to enter the funds held into those additional accounts.
                        All payment services, with the exception of cryptocurrencies, are regulated by the Financial Conduct Authority. Until the final approval of the authorities by the states, companies expect the introduction of Stardust casinos in April.
                        The short layers mean they can make a good show and cant make mistakes.
                        All they must do it speak to a customer support agent and they will review their eligibility.
                        “6.5”” Wind Spinner Diameter 7.5″” Mini Crystal Twister Length 14″” Total Length” 100% stainless steel High quality powder coated Laser…
                        Its powered by RTG and has a generous $9,750 welcome offer.
                        Wheel bearing selections are exclusive to double sealed precision ball bearings which like the swivel raceway are maintenance-free.
                        Drawn to the colorful light reflections, they got to work to develop, innovate, and shape products that bring color and dimensions to homes and gardens everywhere.
                        Responsible gaming has a page dedicated to preventing gambling addiction.
                        Please check back soon as we continue to add new and exciting products to our inventory. Real Time Gaming is the software developer that provides the games for Spinfinity. These are a well-known company within the gaming industry.
                        They have a reputation for providing high-quality, entertaining games. Players can also be assured that the titles are completely fair as they are checked every month by Technical Systems Testing.
                        <br>
                        <b>Customer Support</b>
                        <br>
                        Good thing is that there aren’t many details to distract visitors’ attention from the main sections to be explored-games, promos, and banking. We are the originators of battery/non battery driven wind spinners.
                        The minimum withdrawal is $200 with a maximum casino-games-play.com weekly withdrawal limit of $4000. The casino has solid reputation, even though the withdrawals are not the fastest. Their strong points are being fair,
                        reputable and a giant welcome bonus. It is U.S. friendly and an attractive choice for many.
                        <br>
                        <b>Promotions</b>
                        <br>
                        Read casino reviews published on AUCasinosOnline, select the destination that Neteller accepts and create a casino account. Once the numbers have been drawn by the virtual machine, a new keno game will begin.
                        We wouldn’t be a known casino if we didn’t have great deals for our valuable players. Many players have a series of bad luck that asks them if the games they play are really fair or coded with manipulative techniques in the software.
                        41 currencies covering 200 countries and territories, through a single partner. Play, a website busy making a name for itself in the world of online casino.
                        <br>
                        <b>Exclusive No Deposit Bonus</b>
                        <br>
                        100% stainless steel High quality powder coated Laser cut Perfect for indoors and outdoors EACH WIND SPINNER COMES WITH A STAINLESS… Suggested Retail $45.00/ Our Price $34.00 Animated Designs look like the Blue Jay is flying with the wings moving!
                        Suggested Retail $70.00/ Our Price $49.00 Lg 12″ Animated Collection Gift Set Collection w/10″ Crystal Tail Looks like the bird is flying when spinning. Stunning Effect 100% stainless steel High quality powder coated Laser cut Perfect for indoors… S
                        tunning Effect 100% stainless steel High quality powder coated Laser cut Perfect for indoors and…
                        <br>
                        <b>Bonus Details</b>
                        <br>
                        A lot of American-friendly casinos out there are powered by RTG and look virtually identical. This isn’t the case case with Spinfinity Casino, which brings a custom RTG skin to their customers,
                        making the site stand out from the competition. This site has some really nice promotions on offer and I’m impressed with just how snappy the support response times are.
                        The end result is a casino that I definitely recommend to American punters looking for something that isn’t exactly cookie cutter in appearance.
                        These are just a few of the incredible bonuses that are on offer for existing customers at the casino.
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer Support</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        The sky is the limit when it comes to how much money you can earn. Pala Casino is licensed by the New Jersey Department of Gaming Enforcement.
                        Stars Group includes the existence of additional user-created accounts, Stars Group will close additional accounts without notice and will be able
                        to enter the funds held into those additional accounts. All payment services, with the exception of cryptocurrencies, are regulated by the Financial Conduct Authority.
                        Until the final approval of the authorities by the states, companies expect the introduction of Stardust casinos in April.
                        The short layers mean they can make a good show and can’t make mistakes. <br>

                        - All they must do it speak to a customer support agent and they will review their eligibility. <br>
                        - “6.5”” Wind Spinner Diameter 7.5″” Mini Crystal Twister Length 14″” Total Length” 100% stainless steel High quality powder coated Laser… <br>
                        - It’s powered by RTG and has a generous $9,750 welcome offer. <br>
                        - Wheel bearing selections are exclusive to double sealed precision ball bearings which like the swivel raceway are maintenance-free. <br>
                        - Drawn to the colorful light reflections, they got to work to develop, innovate, and shape products that bring color and dimensions to homes and gardens everywhere. <br>
                        - Responsible gaming has a page dedicated to preventing gambling addiction. <br>
                        Please check back soon as we continue to add new and exciting products to our inventory.
                        Real Time Gaming is the software developer that provides the games for Spinfinity.
                        These are a well-known company within the gaming industry. They have a reputation for providing high-quality, entertaining games.
                        Players can also be assured that the titles are completely fair as they are checked every month by Technical Systems Testing.
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>