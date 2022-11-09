<script setup lang="ts"></script>
<template>
    <head>
        <title>ADD FACILITY</title>
    </head>

    <body>
        <form>
            <div>  
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <h3>Address</h3>
            </div>
            <div id="address">
                <div>  
                    <label for="street">Street</label>
                    <input type="text" name="street" id="street">
                </div>
                <div>
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="dhaka">Dhaka</option>
                        <option value="chittagong">Chittagong</option>
                        <option value="nohakhali">Nohakhali</option>
                        <option value="chandpur">Chandpur</option>
                        <option value="rajshahi">Rajshahi</option>
                    </select>
                </div>
                <div>
                    <label for="state">State</label>
                    <select name="state" id="state">
                        <option value="dhaka">Dhaka</option>
                        <option value="chittagong">Chittagong</option>
                        <option value="nohakhali">Nohakhali</option>
                    </select>
                </div>
                <div>  
                    <label for="zip">Zip</label>
                    <input type="text" name="zip" id="zip">
                </div>
            </div>
            <div>  
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div>  
                <label for="email">Email</label>
                <input type="text" email="email" id="email">
            </div>
            <div>
                <label for="manager">Manager</label>
                <select name="manager" id="manager">
                    <option value="dhaka">Muntasir</option>
                    <option value="chittagong">Rafi</option>
                    <option value="nohakhali">Mehedi</option>
                </select>
            </div>
        </form>
    </body>
</template>

<script>

</script>