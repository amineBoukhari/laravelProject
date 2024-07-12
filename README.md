---
title: Laravel Routes Documentation
---

## Made by: Amine Boukhari & Mohamad Charara


# First use these commands to generate random data : 

## 1 -php artisan migrate 

## 2 - php artisan db:seed
-> this command will generete random product and category and one user : 
email : john.doe@example.com
password : password 

## 3 - php artisan serve






## Public Routes

1. **Create Product Form**
   - Method: `GET`
   - URL: `/products/create`
   - Route Name: `products.create`

2. **List Products**
   - Method: `GET`
   - URL: `/products`
   - Route Name: `products.index`

3. **Show Product Details**
   - Method: `GET`
   - URL: `/products/{id}`
   - Route Name: `products.show`

4. **Shopping Cart**
   - Method: `GET`
   - URL: `/cart`
   - Route Name: `cart.index`

5. **Add to Cart**
   - Method: `POST`
   - URL: `/cart/add`
   - Route Name: `cart.add`

6. **Update Cart Item Quantity**
   - Method: `POST`
   - URL: `/cart/update/{id}`
   - Route Name: `cart.updateQuantity`

7. **Remove Item from Cart**
   - Method: `DELETE`
   - URL: `/cart/remove/{id}`
   - Route Name: `cart.removeItem`

8. **Checkout**
   - Method: `GET`
   - URL: `/checkout`
   - Route Name: `checkout.index`


## Admin Routes

1. **Admin Dashboard**
    - Method: `GET`
    - URL: `/admin`
    - Route Name: `admin`

2. **Store New Product**
    - Method: `POST`
    - URL: `/products`
    - Route Name: `products.store`

3. **Edit Product Form**
    - Method: `GET`
    - URL: `/products/{id}/edit`
    - Route Name: `products.edit`

4. **Update Product Details**
    - Method: `PUT`
    - URL: `/products/{id}`
    - Route Name: `products.update`

5. **Delete Product**
    - Method: `DELETE`
    - URL: `/products/{id}`
    - Route Name: `products.destroy`

6. **Store New Category**
    - Method: `POST`
    - URL: `/categories`
    - Route Name: `categories.store`
