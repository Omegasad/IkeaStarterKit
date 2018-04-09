<script>
    function check() {
        var name = document.getElementById("categoryname").value;
        
        if(!name) {
            name.required = true;
            document.getElementById("outputrequired").innerHTML = "Please enter a category name";
        } else {
            document.getElementById("updatecategory").submit();
        }
    }
</script>

<div>
    <div style="width:800px; margin:0 auto">
        <div style="margin-top:30px; margin-bottom:30px">
            <form method="post" accept-charset="utf-8" 
                  action="/Modifycategory">
                
                <label style="display:block; font-size:18px" for="selectset">Select category: </label>     
                <select name="selectcategory" style="position:relative"
                        onChange="this.form.submit()">

                    {choosecategory}
                    <option id={categoryid} value={categoryid} {default}>{categoryname}</option>
                    {/choosecategory}
                </select>
            </form>
            <br>
            <form method="post" accept-charset="utf-8" 
                  action="/Modifycategory/modify" id="updatecategory">
                
                <label for="categoryname" style="display:block; font-size:18px">New category name: </label>
                <input id="categoryname" name="submitname" type="text" value="{categoryname}"/>
                <input name="submitid" type="hidden" value="{categoryid}"/>
                <p id="outputrequired">{updatestatus}</p>
            </form>
            <button onclick="check()">Update</button>            
        </div>
    </div>
</div>
