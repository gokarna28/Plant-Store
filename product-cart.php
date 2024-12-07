<?php 
/***
 * 
 * Template Name: Product Cart
 */

 get_header(); // call the header
?>
<section class="p-16">
<table id="cartItemsContainer" class="w-full">
    <thead class="border-b bg-slate-100 text-xl font-md shadow-b-md">
        <th class="p-4"></th>
        <th class="p-4">Product</th>
        <th class="p-4">Price</th>
        <th class="p-4">Quantity</th>
        <th class="p-4">Subtotal</th>
    </thead>
    <tbody id="cartItems">
       <!-- cart items are append dynamically here -->
    </tbody>
</table>
</section>
 <?php 
 get_footer();//call the footer