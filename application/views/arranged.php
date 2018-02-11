<div>
    <div style="width:800px; margin:0 auto; min-width:8000px">
        <div width =800px style="position:relative; left:0; top:0">
        <img src= {bgfile} width =800px style="position:relative;
             left:0; top:0"/> 
        <img src= {paintingfile} width =200px style="position:absolute;
             top:40px; left:180px;">
        <img src= {sofafile} width= 500px style="position:absolute;
             top:175px; left:280px;"/>
        <img src= {tablefile} width =300px style="position:absolute;
             top:290px; left:120px;"/>     
         <img src= {lampfile} width =50px style="position:absolute;
             top:270px; left:50px;">        

        </div>
        <div >
        <form method="post" accept-charset="utf-8" 
              action="<?php echo site_url("Homepage"); ?>">
        <select name="selectset" style="position:relative"
                onChange="this.form.submit()">
       
        <?php $chosen = $_POST["selectset"]; ?>
        <option value=0 <?php if (isset($chosen) && $chosen == 0) 
            echo "selected" ?>>Set A</option>
        <option value=1 <?php if (isset($chosen) && $chosen == 1)
            echo "selected" ?>>Set B</option>
        <option value=2 <?php if (isset($chosen) && $chosen == 2)
            echo "selected" ?>>Set C</option>
        <option value=3 <?php if (isset($chosen) && $chosen == 3)
            echo "selected" ?>>Set D</option>
     
        </select>
        </form>
            <div id="row">
            <div class="span1">
            setid: {setid}<br />
            setname: {setname}<br />
            sofaid: {sofaid}<br />
            tableid: {tableid}<br />
            lampid: {lampid}<br />
            paintingid: {paintingid}<br />
            totalvolume: {totalvolume}<br />
            totalweight: {totalweight}<br />
            totalcost: {totalcost}<br /><br /><br />
            </div>
        </div>
        </div>
    </div>
    
</div>
