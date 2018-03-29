<html>
    <head>
        <?php $this->load->view('head');?>
    </head>
    <body>

            <?php $this->load->view('header');?>

            <?php $this->load->view($page,$this->data);?>
            <?php $this->load->view('footer');?>

    </body>
</html>