
<script>
    function check() {
        var sofaelement = document.getElementById("submitsofa").value;
        var tableelement = document.getElementById("submittable").value;
        var paintingelement = document.getElementById("submitpainting").value;
        var lampelement = document.getElementById("submitlamp").value;
        var name = document.getElementById("submitname2").value;
        
        if(isNaN(sofaelement) || isNaN(tableelement) || isNaN(paintingelement)
                || isNaN(lampelement) || !name) {
            sofaelement.required = true;
            tableelement.required = true;
            paintingelement.required = true;
            lampelement.required = true;
            name.required = true;
            document.getElementById("outputrequired").innerHTML = "Set is incomplete";
        } 
        else {
            document.getElementById("createset").submit();
        }
    }
</script>
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
              action="/modifyset">
            
        <label style="display:block; font-size:18px" for="selectset">Select set: </label>     
        <select name="selectset" style="position:relative"
                onChange="this.form.submit()">
        
        {chooseset}
        <option id={setid} value={setid} {default}>{setname}</option>
        {/chooseset}

        </select>
        </form>  
        </div>
        
        <div >
        <form method="post" accept-charset="utf-8" 
              name="selection" action="/modifyset/selection">
        
        <label style="display:block; font-size:16px" for="sofaname">{category0}: </label>    
        <select name="selectsofa" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {sofas}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/sofas}
        </select>
        
        </br><label style="display:block; font-size:16px" for="tablename">{category1}: </label>   
        <select name="selecttable" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>  
        {tables}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/tables}
        </select>
        
        <br><label style="display:block; font-size:16px" for="lampname">{category2}: </label> 
        <select name="selectlamp" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {lamps}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/lamps}
        </select>
        
        <br><label style="display:block; font-size:16px" for="paintingname">{category3}: </label>   
        <select name="selectpainting" style="position:relative"
                onChange="this.form.submit()">
        <option id="blank"{default}></option>
        {paintings}
        <option id={itemid} value={itemid} {default}>{itemname}</option>
        {/paintings}
        </select>
            
        <input id="submitname" name="submitname" type="hidden" 
               type="text" value={outputname} />   
        <input id="submitid" name="submitid" type="hidden" value={outputsetid} />
        </form>
            
        <form method="post" accept-charset="utf-8" 
              name="modifyset" action="/modifyset/modify" id="createset">  
        <label for="submitname" style="display:block; font-size:16px">Set Name: </label>
        <input id="submitname2" name="submitname2" type="text" value="{outputname}" />   
        <input id="submitid2" name="submitid" type="hidden" value={outputsetid} />

        <input id="submitsofa" name="submitsofa" type="hidden" value={outputsofa} />
        <input id="submittable" name="submittable" type="hidden" value={outputtable} />
        <input id="submitlamp" name="submitlamp" type="hidden" value={outputlamp} />
        <input id="submitpainting" name="submitpainting" type="hidden" value={outputpainting} />   
        <p id="outputrequired"></p>
        </form>
            <button onclick="check()" style="margin-bottom:30px" >Change Set </button> </br> 
        </div>
    </div>
    
</div>