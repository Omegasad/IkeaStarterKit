<script>
    function check() {
        var name = document.getElementById("itemname").value;
        var length = parseFloat(document.getElementById("itemlength").value);
        var width = parseFloat(document.getElementById("itemwidth").value);
        var height = parseFloat(document.getElementById("itemheight").value);
        var weight = parseFloat(document.getElementById("itemweight").value);
        var price = parseFloat(document.getElementById("itemprice").value);
      
        if(!name || isNaN(length) || isNaN(width) 
                || isNaN(height) || isNaN(weight) || isNaN(price)) {
            name.required = true;
            length.required = true;
            width.required = true;
            height.required = true;            
            weight.required = true;
            price.required = true;
            document.getElementById("outputrequired")
                    .innerHTML = "Form is incomplete";
        }else if (length < 0 || width < 0 || height < 0 
                    || weight < 0 || price < 0) {
            document.getElementById("outputrequired")
                    .innerHTML = "Length, Width, Height, Weight, and Price must be a positive number";
        } else {
            document.getElementById("updateitem").submit();
        }
    }
    
    function categoryChanged() {
        document.getElementById("catIsChanged").value = true;
        document.getElementById("changeSelection").submit();        
    }
</script>

<div>
    <div style="width:800px; margin:0 auto">
        <div width =800px style="margin-top: 5em">
        <img class="center-block" src={itemfilepath} style="display:block; margin-left:auto; margin-right:auto; width:auto; height:200px;">
        </div>
        <div style="margin-top:30px; margin-bottom:30px">
            <form method="post" accept-charset="utf-8" 
                  action="/Modifyaccessory" id="changeSelection">
                
                <label style="display:block; font-size:18px" for="selectset">Select category: </label>     
                <select name="selectcategory" style="position:relative"
                        onChange="categoryChanged()">

                    {choosecategory}
                    <option id={categoryid} value={categoryid} {default}>{categoryname}</option>
                    {/choosecategory}
                </select>
                
                <label style="display:block; font-size:18px" for="selectset">Select accessory: </label>     
                <select name="selectaccessory" style="position:relative"
                        onChange="this.form.submit()">

                    {chooseaccessory}
                    <option id={itemid} value={itemid} {default}>{itemname}</option>
                    {/chooseaccessory}
                </select>
                <input id="catIsChanged" name="catIsChanged" type="hidden" value="false"/>
            </form>
            <br>
            <form method="post" accept-charset="utf-8" 
                  action="/Modifyaccessory/modify" id="updateitem">
                
                <label for="itemname" style="display:block; font-size:16px;">Item name: </label>
                <input id="itemname" name="submitname" type="text" value="{itemname}" style="width:50%"/>
                
                <label for="itemlength" style="display:block; font-size:16px">Length: </label>
                <input id="itemlength" name="submitlength" type="number" value="{itemlength}"/>
                
                <label for="itemwidth" style="display:block; font-size:16px">Width: </label>
                <input id="itemwidth" name="submitwidth" type="number" value="{itemwidth}"/>
                
                <label for="itemheight" style="display:block; font-size:16px">Height: </label>
                <input id="itemheight" name="submitheight" type="number" value="{itemheight}"/>
                
                <label for="itemweight" style="display:block; font-size:16px">Weight: </label>
                <input id="itemweight" name="submitweight" type="number" value="{itemweight}"/>
                
                <label for="itemprice" style="display:block; font-size:16px">Price: </label>
                <input id="itemprice" name="submitprice" type="number" value="{itemprice}"/>
                
                <input name="itemid" type="hidden" value="{itemid}"/>
                
                <p id="outputrequired">{updatestatus}</p>
            </form>
            <button onclick="check()">Update</button>            
        </div>
    </div>
</div>
