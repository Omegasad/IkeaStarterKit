<div>
    <div style="width:800px; margin:0 auto">
        <div width =800px style="position:relative; left:0; top:0">
        <img src= {bgfile} width =800px style="position:relative;
             left:0; top:0"/> 
        <img src= {paintingfile} width=40% {paintingvisible} style="position:absolute;
             top:40px; left:180px;" >
        <img src= {sofafile} width=55% height=55% {sofavisible} style="position:absolute;
             top:200px; left:350px;"/>
        <img src= {tablefile} width=35% height=35% {tablevisible} style="position:absolute;
             top:300px; left:225px;"/>     
         <img src= {lampfile} width =75px {lampvisible} style="position:absolute;
             top:200px; left:50px;">        

        </div>
        <div >
        <form method="post" accept-charset="utf-8" 
              name="selection" action="/create/selection">
            
        <select name="selectsofa" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {sofas}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/sofas}
        </select>
       
        <select name="selecttable" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
            
        {tables}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/tables}
        </select>
        
        <select name="selectlamp" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {lamps}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/lamps}
        </select>
        
        <select name="selectpainting" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {paintings}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/paintings}
        </select>
            
        </form>
        <form method="post" accept-charset="utf-8" 
              name="createset" action="/create/createset">  
        <input name="submitsofa" type="hidden" value={outputsofa} />
        <input name="submittable" type="hidden" value={outputtable} />
        <input name="submitlamp" type="hidden" value={outputlamp} />
        <input name="submitpainting" type="hidden" value={outputpainting} />        
        <input name="submit"type="submit" onclick="this.form.submit()" value="Create Set" >
        </form>
            outputsofa: {outputsofa}<br />
            outputtable: {outputtable}<br />
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