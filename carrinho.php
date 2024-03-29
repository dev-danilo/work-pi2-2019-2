<html>
    <head>

        <title>Chassis Shop Carrinho</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">  
  <!--<script src="js/jquery-3.4.1.js" type="text/javascript"></script>-->
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="carrinho.css">
        <script src="carrinho.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!--
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

    </head>
    <body>

    <?php
        session_start();
        //session_destroy();
        $qtdproduto=0;
        if(!isset($_SESSION["produtos"])){
            
        }
        else {
            $produtos = $_SESSION["produtos"];
            foreach($produtos as $values)
                $qtdproduto++;
/*
            foreach($produtos as $values)
                echo 'CODIGO: ' .$values['id']. ' nome: ' . $values['nome']. 'preco: ' .$values['preco']. 
                ' qtd: ' . $values['qtd'].'img: ' .$values['img']. ' categoria: ' . $values['categoria_fk'];
                
            */
        }
    ?>
   
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><h3>Chassis E-commerce</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item m-auto">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Carrinho<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                    </div>
                    <a class="btn btn-success btn-sm ml-3" href="#">
                        <i class="fa fa-shopping-cart"></i> Carrinho
                        <span class="badge badge-light"><? echo $qtdproduto;?></span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
        </div>
    </section>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Produto(s)</th>
                                <th scope="col" >Acessível</th>
                                <th scope="col" class="text-center">Quantidade</th>
                                <th scope="col" class="text-center">Preço</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php
                            $total = 0;
                                 if(!isset($_SESSION["produtos"])){
                    
                                }
                                else {
                                    $produtos = $_SESSION["produtos"];
                                    
                                    
                                    foreach($produtos as $id=>$values){
                                      $aux="";

                                      $aux=($id%2==0)?"background-color: rgba(0,0,0,0)" : "background-color: #fff;";
                                       ?>
                                        <tr>
                                            <td><a href="#"><img src="images/<?php echo $values['img'];?>" alt="" width="62" height="48"></a></td>
                                            <td><br><?php echo $values['nome'];?></td>
                                            <td><br><?php $estoque = $values['qtd'] !=0 ? "Em estoque":"Estoque esgotado"; 
                                                        echo $estoque ?> </td>
                                            <td><br><div class="quantity">
                                                <a href="#" id="<?php echo('quantity__minus'.$values['id']);?>" class="quantity__minus" onclick="diminuir('<?php echo $values['id']; ?>','<?php echo $values['preco']; ?>')"><span>-</span></a>
                                                <input id="<?php echo('quantity'.$values['id']);?>" disabled type="text" class="quantity__input" value="<?php echo $values['qtd']?>">
                                                    <a href="#" id="<?php echo('quantity__minus'.$values['id']);?>" class="quantity__plus" onclick="aumentar('<?php echo $values['id']; ?>','<?php echo $values['preco']; ?>')"><span>+</span></a>
                                                </div></td>
                                            <td><br> 
                                                <input id="<?php echo('price'.$values['id']);?>" style="<?php echo $aux;?>" disabled type="text" class="price" value="<?php echo "R$ ".$values['preco'];?>">
                                                        
                                                        </td>
                                            <td id="<?php echo $values['id'];?>"class="text-left"><br><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></button></td>
                                        </tr>
                            <?php
                                    }
                                    
                                }
                            ?>

                            <!--<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Frete</td>
                                <td class="text-right">6,90 </td>
                            </tr>-->
                            <tr>
                                <td>    </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>TOTAL</strong></td>
                                <td class="text-right"><strong><?php echo "R$ ".(double)$total;?> </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <a class="btn btn-lg btn-block btn-secondary text-uppercase" href="index.php">Continue Comprando</a>
                    </div>

                
                    <div class="col-sm-12 col-md-7   text-right float-right" >
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer 
    <footer class="text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3">
                    <h5>About</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p class="mb-0">
                        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                    <h5>Informations</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="">Link 1</a></li>
                        <li><a href="">Link 2</a></li>
                        <li><a href="">Link 3</a></li>
                        <li><a href="">Link 4</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <h5>Others links</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="">Link 1</a></li>
                        <li><a href="">Link 2</a></li>
                        <li><a href="">Link 3</a></li>
                        <li><a href="">Link 4</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h5>Contact</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-home mr-2"></i> My company</li>
                        <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
                        <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
                        <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
                    </ul>
                </div>-->
                <div class="col-12 copyright mt-3">
                    <p class="float-left">
                        <a href="#"><center>Voltar ao início</center></a>
                    </p>
                </div>
                
            </div>
        </div>
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Danilo Pereira Website 2019</p>
            
                    <center><a class="nav-link" href="contato.php">Contato</a></center>
                
            </div>
            <!-- /.container -->
        </footer>
    </footer>
    </body>
</html>