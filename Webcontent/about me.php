<?php
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header('Location: login.php');
        exit;
    }
    
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/CISC7105-GroupAssgn-About me.css">

</head>
<body>


<!-- header section starts  -->

<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Happy Goat<span>.</span></a>

    <nav class="navbar">
        <a href="cisc7105-PairAssgn-home.html">Home</a >
        <a href="Clothes.html">Clothes</a >
        <a href="Food.html">Food</a >
        <a href="about me.php">About us</a >
    </nav>


       <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
            <?php if (isset($_SESSION['user_email'])): ?>
        <a href="profile.php?name=<?= urlencode($_SESSION['user_email']); ?>">
            <?= htmlspecialchars($_SESSION['user_email']); ?>
        </a>
    <?php endif; ?>
        </div>

</header>
<!-- header section ends -->


<!-- video-container section starts  -->
<div class="video-container">
    <video src="images/caoyuan.mp4" loop autoplay muted></video>
    <div class="content1">
        <h1>Specializing in Goat</h1>
    </div>
</div>
<!-- video-container section ends -->

<!-- icons section starts -->
<section class="data-container">
    <div class="data">
      <div class="info">
        <span>Market Covered</span>
        <h3>30+ Regions</h3>
      </div>
    </div>
  
    <div class="data">
      <div class="info">
        <span>Product Patents</span>
        <h3>100+</h3>
      </div>
    </div>

    <div class="data">
      <div class="info">
        <span>International Industrial Design Awards</span>
        <h3>21 Award Winners</h3>
      </div>
    </div>
</section>

<!-- Company Introduction section starts-->
<!-- left image -->
<section class="Goat-intro">
    <div class="image-container">
        <img src="images/about1.png" alt="Dog wearing a smart collar">
    </div>
    <div class="text-container">
        <h2>Brand Concept</h2>
        <p>
            Here, we believe that true quality comes from respect for nature and persistence in innovation. Our mission is to improve people's quality of life and health by providing the purest, most nutritious goat milk products. Every bottle of goat milk carries our promise: to ensure the freshest quality, rich in natural nutrients, without any artificial ingredients.

Our goat milk comes directly from our own farms, and every step of the production process is strictly controlled to ensure that each batch of products meets the highest quality standards. Our sheep are raised in the best possible environment to ensure they are healthy and happy, as we firmly believe that only healthy sheep can produce the highest quality milk.
        </p>
    </div>
</section>

<!-- right image -->
<section class="Goat-intro">
    <div class="text-container">
        <h2>The Beginning of PETKIT</h2>
        <p>
            At Happy Goat, we not only manufacture products, we also deliver a lifestyle and advocate the concept of harmonious symbiosis with nature. We hope that through our products, consumers can feel the gifts from nature and experience a life where nutrition and health coexist.

            Through continuous investment in scientific research and technological innovation, we are committed to transforming traditional goat milk products into high-quality choices that meet the needs of modern consumers. [Company Name], a brand for health, a choice you and your family can trust.
        </p>
    </div>
    <div class="image-container">
        <img src="images/about2.png" alt="Dog wearing a smart collar">
    </div>
</section>

<!-- backgroundcolor image -->
<section class="Goat-intro1">
    <div class="image-container">
        <img src="images/milk.png" alt="Dog wearing a smart collar">
    </div>
    <div class="text-container">
        <h2>Quantity Products</h2>
        <h3>Milk Protein</h3>
        <h4>20%</h4>
        <h3>48 Hours</h3>
        <h4>Freshness After Milking<h4>
        <h3>Rich in Calcium</h3>
        <h4>200 mg per 100 ml<h4>
        <p></p>
    </div>
</section>

<!-- left image -->
<section class="Goat-intro">
    <div class="image-container">
        <img src="images/about3.png" alt="Dog wearing a smart collar">
    </div>
    <div class="text-container">
        <h2>Environmental protection concept</h2>
        <p>
            We are committed to using renewable and sustainable resources to support our production 
            activities. By employing state-of-the-art technologies and methods, we minimize our dependence
             on natural resources while ensuring that our operations have minimal impact on the environment. We prioritize recycled materials and use environmentally friendly materials in our packaging and production processes.
        </p>
    </div>
</section>

<!-- right image -->
<section class="Goat-intro">
    <div class="text-container">
        <h2>Business Goals</h2>
        <p>
            The company will endeavour to build a representative brand in the Inner Mongolia sheep 
            products industry. We will enhance brand awareness and recognition through innovative 
            marketing strategies, including advertising, promotional activities, social media and 
            exhibitions.

        </p>
    </div>
    <div class="image-container">
        <img src="images/about4.png" alt="Dog wearing a smart collar">
    </div>
</section>

<!-- Company Introduction section ends-->

<!-- Staff Introduction stars-->

<!-- Staff Introduction ends-->

<!--  Testimonial-->
<section class="title1">
    <h1 class="heading"> <span> About </span> us </h1>
</section>

<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>As founder and chief nutritionist, he oversees nutritional standards and product 
                    development for sheep products. With a rich background in nutrition, Huang Jiaqi 
                    ensures that each product is rich in nutrients beneficial to consumers, while driving 
                    innovation to develop goat milk products that meet modern health needs.
                </p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="images/hjq.jpg" class="img" alt="">
                <h3>HuangJiaQi</h3>
            </div>
            
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>As market development director, Lu Chang focuses on expanding the company's influence 
                    in domestic and foreign markets. What's more, Relying on her expertise in market strategy and 
                    consumer behavior analysis, Lu Chang developed a series of successful market entry and brand promotion strategies.
                </p>
                <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                </div>
                <img src="images/lc.jpg" class="img" alt="">
                <h3>LuChang</h3>
            </div>
            
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>As the director of production operations, he controls every aspect of the company 
                    from raw material procurement to finished product production. Although,through strict quality 
                    control and efficient supply chain management, she ensures that each batch of goat 
                    milk products meets the highest quality standards.
                <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                </div>
                <img src="images/tinna.png" class="img" alt="">
                <h3>LiangZiXin</h3>
            </div>

            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Served as technical research and development director, focusing on technological 
                    innovation and production process improvement of goat milk products. What's more, using the latest 
                    food technology, she led this team to develop a number of patented technologies to make
                     the extraction and processing of milk more efficient and high-quality!!!
                <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                </div>
                <img src="images/kia.png" class="img" alt="">
                <h3>TangQiFeng</h3>
            </div>
            
        </div>
    </div>
</div>

<!-- contact section starts  -->
<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">
        <div class="image">
            <img src="images/about5.png" alt="">
        </div>

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

       

    </div>

</section>
<!-- contact section ends -->

<!-- footer starts -->
<section class="footer">
    <div class="credit">  <span>CISC7105 Internet Programming and Java Technology</span> 
    <br>
    <span>Group05: mc351758 HuangJiaqi| mc352574 LuChang | mc351227 LiangZiXin | mc353393 TangQiFeng</span>
    </div>
</section>
<!-- footer ends -->
</body>
</html>