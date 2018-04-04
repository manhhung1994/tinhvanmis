<html>

    <body>
            <?php $this->load->view('head');?>

            <?php $this->load->view('header',$this->data);?>
<!--            --><?php //$this->load->view('inner',$this->data);?>

            <?php $this->load->view($page,$this->data);?>

            <?php $this->load->view('footer');?>

    </body>
</html>