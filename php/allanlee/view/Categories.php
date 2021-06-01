<?php

namespace allanlee\view;

class Categories extends View{
    
protected function section($categories){
?>
    <header>		
<h2 class="container text-center page-header"><?= $this->title ?></h2> 
</header>      
<article class="container">
    <!-- Example row of columns -->
 <nav class="row">

 <?php
while($categories->next()) {
            ?>
        <a href="products.php?id=<?= $categories->getId() ?>">
                <section class='col-md-3 col-sm-6 col-xs-12 text-center'>         
                    <img src='<?= IMAGE_URL . $categories->getImage() ?>' height='100px'>
                    <p><?= $categories->getName() ?></p>  
                </section>
            </a>
            <?php
        }
        ?> 
    </nav>
</article>
    
   <?php     
}
}

?>
