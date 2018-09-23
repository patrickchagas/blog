<?php if(!class_exists('Rain\Tpl')){exit;}?>
<style type="text/css">
    
    
    body{ 
    background-color: #e9eef1;
    margin: 0px;
    padding: 0px;
}

@media (min-width: 1200px){
.container {
    width: 1170px;
}

}

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.row {
    margin-right: -15px;
    margin-left: -15px;
}

.col-xs-12 {
    width: 100%;
}

.blog-grids {
    overflow: hidden;
    margin: 0 -15px;
}

.blog-grids .grid {
    background-color: #fff;
    width: calc(33.33% - 30px);
    float: left;
    padding: 15px;
    margin: 20px 15px 15px;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
}

.entry-media img {
    border-radius: 10px;
    width: 100%;
    max-height: 188px;
}

.entry-body {
    padding: 27px 10px;
}

.entry-body .cat {
    font-family: "Poppins", sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #6220d9;
    text-transform: uppercase;
}

.entry-body h3 {
    font-size: 21px;
    font-weight: 600;
    line-height: 1.30em;
    margin: 3px 0 0.73em;
}

.entry-body h3 a {
    color: #41516a;
}

.entry-body h3 a:hover {
    color: #6220d9;
    text-decoration: none;
}

.entry-body p {
    margin-bottom: 2em;
    color: #90949a;
    line-height: 1.8em;
}

.read-more-date {
    position: relative;
}

.read-more-date a {
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    font-size: 1.06667rem;
    font-weight: 600;
    color: #41516a;
    text-transform: uppercase;
}

.read-more-date .date {
    position: absolute;
    right: 0;
    color: #90949a;
}

.p-title{
    margin: 20px;
    font-size: 29px;
}



</style>

<div class="container">
    <div class="row">
        <div class="col col-xs-12">
            <h4 class="p-title"><b><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></h4>
            <div class="blog-grids">

                <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>

                <div class="grid">
                    <div class="entry-media">
                        <a href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt=""></a>
                    </div>
                        <div class="entry-body">
                        <span class="cat"><a href="/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></a>
                        <h3><a href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h3>
                        <p><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

                        <div class="read-more-date">
                            <a href="/posts/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Read More..</a>
                            <span class="date"><?php echo formatDate($value1["dtregister"]); ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>                 
    </div>

        <?php require $this->checkTemplate("pagination");?>
</div>