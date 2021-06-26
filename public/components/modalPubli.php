<div id="PostPublication" class="modalDialog">
      <div>
         <a href="#close" title="Close" class="close">X</a>
         <form action="<?php echo constant('URL'); ?>signup/newUser" method="POST">
            <div class="parent">
                <div class="FormPostPublication">
                    <input type="text" name="Description" id="Description"  placeholder="Description" class='Description'>
                    <input type="text" name="File" id="File"  placeholder="File" class='File'>
                    <?php $this->showMessages();?>
                </div>
                <div class="PublicationSubmit">
                    <input type="submit" value="Post" class="btn btn-primary"/>
                </div>
            </div>
        </form>
       </div>
</div>