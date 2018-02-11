<div>
    <div style="width:800px; margin:0 auto">
        <div width =800px style="position:relative; left:0; top:0">
        <img src= {bgfile} width =800px style="position:relative;
             left:0; top:0"/> 
        <img src= {paintingfile} width=40% style="position:absolute;
             top:40px; left:180px;">
        <img src= {sofafile} width=55% height=55% style="position:absolute;
             top:200px; left:350px;"/>
        <img src= {tablefile} width=35% height=35% style="position:absolute;
             top:300px; left:225px;"/>     
         <img src= {lampfile} width =75px style="position:absolute;
             top:200px; left:50px;">        

        </div>
        <div >
        <form method="post" accept-charset="utf-8" 
              action="Homepage">
        <select name="selectset" style="position:relative"
                onChange="this.form.submit()">
       
        {chooseset}
        <option id={setid} value={setid} {default}>{setfullname}</option>
        {/chooseset}

        </select>
        </form>
            <div class="viewdata">
            Set ID: {setid}<br />
            Set Name: {setfullname}<br />
            Sofa ID: {sofaid} | Table ID: {tableid} <br />
            Lamp ID: {lampid} | Painting ID: {paintingid} <br />
            Total Volume: {totalvolume} cubic centimetres<br />
            Total Weight: {totalweight} kg<br />
            Total Cost: ${totalcost}<br /><br /><br />
            </div>
        </div>
    </div>
    
</div>