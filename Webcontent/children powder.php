<?php
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header('Location: login.php');
        exit;
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wool coats</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="css/CISC7105-PairAssgn-Pair09-wool coat.css">



  <!-- 
    - google font link
  -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/css/ionicons.min.css">

</head>
<body>
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="logo">Happy Goat<span>.</span></a>
    <nav class="navbar">
        <a href="cisc7105-PairAssgn-home.php">Home</a >
        <a href="Clothes.php">Clothes</a >
        <a href="Food.php">Food</a >
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const productDisplay = document.querySelector('[data-product-display]');
    const productThumbnails = document.querySelectorAll('[data-product-thumbnail]');

    productThumbnails.forEach((thumbnail) => {
      thumbnail.addEventListener('click', () => {
        productDisplay.src = thumbnail.src;
        productThumbnails.forEach((item) => {
          item.parentElement.classList.remove('active');
        });
        thumbnail.parentElement.classList.add('active');
      });
    });
  });
</script>
<body>

  <main>
    <article>

      <!-- 
        - #BREADCUMB
      -->

      <div class="breadcumb-wrapper">

        <h2 class="page-title">Product Details</h2>

        <ol class="breadcumb-list">

          <li class="breadcumb-item">
            <a href="cisc7105-PairAssgn.php" class="breadcumb-link">Home</a>
          </li>

          <li class="breadcumb-item">Product</li>

        </ol>

      </div>





      <!-- 
        - #PRODUCT DETAILS
      -->

      <section class="section product-details">
        <div class="container">

          <div class="wrapper">

            <div class="product-details-img">

              <figure class="product-display">
                <img src="images/儿童奶粉.jpg" width="700" height="700" 
                  alt="Non-starchy vegetables." class="w-100" data-product-display>
              </figure>

              <ul class="product-thumbnail-list has-scrollbar">

                <li class="product-thumbnail-item">
                  <img src="images/奶细节1.jpg" width="700" height="700" 
                    alt="Non-starchy vegetables." class="w-100" data-product-thumbnail>
                </li>

                <li class="product-thumbnail-item">
                  <img src="images/奶细节2.jpg" width="700" height="700" 
                    alt="Non-starchy vegetables." class="w-100" data-product-thumbnail>
                </li>

                <li class="product-thumbnail-item">
                  <img src="images/奶细节3.jpg" width="700" height="700" 
                    alt="Non-starchy vegetables." class="w-100" data-product-thumbnail>
                </li>

               

              </ul>

            </div>

            <div class="product-details-content">

              <h3 class="product-title">Children's goat's milk powder</h3>

              <data class="product-price" value="350.00">63.00 USD</data>

              <div class="rating-wrapper">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>

              <p class="product-text">
				The main ingredient of infant goat milk powder products is goat milk. Compared to cow's milk, goat's milk differs in protein and fat content and is closer to the composition of breast milk. Goat milk is rich in nutrients such as protein, fat, carbohydrates, vitamins and minerals. In addition, the products are fortified with probiotics and prebiotics to promote intestinal health and digestion.
			</p>

              <div class="product-weight-wrapper">

                <p class="product-weight-title">Weight :</p>

                <ul class="product-weight-list">

                  <li class="product-weight-item">
                    <input type="radio" name="weight" id="weight-1" class="product-weight-radio">

                    <label for="weight-1" class="product-weight-label">100PCS</label>
                  </li>

                  <li class="product-weight-item">
                    <input type="radio" name="weight" id="weight-2" class="product-weight-radio">

                    <label for="weight-2" class="product-weight-label">500PCS</label>
                  </li>

                  <li class="product-weight-item">
                    <input type="radio" name="weight" id="weight-3" class="product-weight-radio">

                    <label for="weight-3" class="product-weight-label">1000PCS</label>
                  </li>

                  <li class="product-weight-item">
                    <input type="radio" name="weight" id="weight-4" class="product-weight-radio">

                    <label for="weight-4" class="product-weight-label">MORE</label>
                  </li>

                </ul>

              </div>

              <div class="product-qty">
                <input type="number" name="quantity" value="1" min="1" max="50" class="product-qty-input">

                <button class="btn btn-primary product-qty-btn">Add To Cart</button>
              </div>

            </div>

          </div>

          <h4 class="description-title">Descripton :</h4>

          <p class="description-text">
           We use high quality goat's milk as the main ingredient of our products. Goat milk is rich in nutrients such as proteins, fats, carbohydrates, vitamins and minerals, providing comprehensive nutritional support for your baby's healthy growth. Our goat milk powder is professionally formulated to meet the nutritional needs of infant growth and development. We precisely control the proportion of each nutrient to ensure that babies receive balanced and appropriate nutrition. Our goat milk powder strictly follows international food safety standards and quality management systems to ensure the safety and high quality of our products. We conduct strict screening of raw materials and stringent quality tests during the production process to ensure the quality of every can of our products.
          </p>

          <h4 class="description-title">Additional Information :</h4>

          <table class="description-table" border="1px">

            <tr class="table-row">
              <th class="table-heading" scope="row">Ratings</th>

              <td class="table-data">
              5.00
              </td>
            </tr>

            <tr class="table-row">
              <th class="table-heading" scope="row">Material Type</th>

              <td class="table-data">Goat's milk</td>
            </tr>

            <tr class="table-row">
              <th class="table-heading" scope="row">Weight</th>

              <td class="table-data">1KG</td>
            </tr>

            <tr class="table-row">
              <th class="table-heading" scope="row">Seller</th>

              <td class="table-data">Mongolia</td>
            </tr>

            <tr class="table-row">
              <th class="table-heading" scope="row">Size</th>

              <td class="table-data">Packed in boxes</td>
            </tr>

          </table>

        </div>
      </section>

    </article>
  </main>
<!-- footer section starts  -->
<br><br><br><br>
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">products</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">india</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">example@gmail.com</a>
            <a href="#">mumbai, india - 400104</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>

    <div class="credit"><span>CISC7105 Internet Programming and Java Technology - 2024:mc353393 TangQifeng mc351758| mc351227 LIANG ZIXIN| HuangJiaqi| mc352574 LuChang </span> </div>

</section>

<!-- footer section ends -->
</html>