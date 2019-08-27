<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';


      session_start();
      

  if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
      }

      //adiciona produto

      if(isset($_GET['acao'])){
        

        //adicionar carrinho

        if($_GET['acao'] == 'add'){


         
          $id = intval($_GET['id']);
         
          if(!isset($_SESSION['carrinho'][$id])){
           
            $_SESSION['carrinho'][$id] = 1;
          }else{
          
            $_SESSION['carrinho'][$id] += 1;

          }
        }




        if($_GET['acao'] == 'del'){
          if(isset($_SESSION['carrinho'])){
                $id = intval($_GET['id']);
                unset($_SESSION['carrinho'][$id]);
          }
        }

        //edita quantidade do produto
          if ($_GET['acao'] == 'up') {

            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            if(is_array($_POST['prod'])){
              foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0){
                    $_SESSION['carrinho'][$id] = $qtd;
                }else{
                    unset($_SESSION['carrinho'][$id]);
                }
              }
              
            }
          }

     }
  

      print_r($_SESSION['carrinho']);


    
?>

<div class="row">
	<div class="col s12 m6 push-m3">
    <h3 class="light"> Finalizar o Pedido</h3>
   
    
    
      

      

				
      <h5 class="light"> Carrinho de Compras</h5>

      <table class="striped">
      <thead>
        <tr>
          
          <th>Descrição</th>
          <th>Quantidade</th>
          <th>Preço Unitario</th>
          <th>SubTotal</th>
          <th>Remover</th>
                
        </tr>
      </thead>
            <form action="?acao=up" method="post">
      <tbody>


        <?php

        


        if(count($_SESSION['carrinho']) == 0){
          echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
        }else{

          foreach ($_SESSION['carrinho'] as $id => $qtd) {
             $sql = "Select ds_produto,qt_litros,nm_marca,vl_venda,cd_produto from produto_view where cd_produto = '$id'";
               $qr = mysqli_query($connect, $sql);
               $ln = mysqli_fetch_array($qr);
               $nome = $ln['ds_produto']." ".$ln['qt_litros']." Litros"."  ".$ln['nm_marca'];
               $preco = number_format($ln['vl_venda'],2,',','.');
               $sub = number_format($ln['vl_venda'] * $qtd,2,',','.');
                              
         ?>
        <tr>
          
          <td><?php echo $nome; ?></td>
          
          <td><input type="text" class="col s1"   name="prod[<?php echo $id; ?>]" value="<?php echo $qtd; ?>"></td>

          <td><?php echo $preco; ?></td>

          <td><?php echo $sub; ?></td>

          <td><a href="?acao=del&id=<?php echo $id; ?>" class="btn-floating red"><i class="material-icons">delete</i></a></td>

        </tr>
     

       
        <?php  

             }
        }
    
    ?>

         

      </tbody>
      <tfoot>
              

              <tr><td colspan="1"><button type="submit"   class="btn btn-default">Atualizar Carrinho</button></td></tr>
              <tr><td colspan="3"> <a href="escolher_item_pedido.php" class="btn green"> Continuar comprando </a></td></tr>
              <tr><td colspan="5"> <a href="index.php" class="btn red"> Cancelar</a></td><tr>
      </tfoot>
        </form>
    </table>
    <hr>


	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>