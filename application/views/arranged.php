<div>
    <div style="width:800px; margin:0 auto">
        <div width =800px style="position:relative; left:0; top:0">
        <img src= {bgfile} width =800px style="position:relative;
             left:0; top:0"/> 
        <img src= {paintingfile} width =200px style="position:absolute;
             top:40px; left:180px;">
        <img src= {sofafile} width= 380px style="position:absolute;
             top:235px; left:300px;"/>
        <img src= {tablefile} width =280px style="position:absolute;
             top:300px; left:120px;"/>     
         <img src= {lampfile} width =50px style="position:absolute;
             top:270px; left:50px;">        

        </div>
        <div >
        <form method="post" accept-charset="utf-8" 
              action="Homepage">
        <select name="selectset" style="position:relative"
                onChange="this.form.submit()">
       
         {chooseset}
        <option id={setid} value={setid} {default}>{setname}</option>
        {/chooseset}

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