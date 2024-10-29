# Recetas
This is an API that allows you to create, read, update and delete recipes. It is a basic API connected to a local database.


## Capabilities

### Create a recipe
To create a recipe you need to send a POST request to the endpoint `/new.php` with the following body:
```json
{
    "Plato": "Recipe name", 
    "Ingredientes": "Ingredients",
    "Pasos": "Instructions"
}
```

### Read recipes
To read recipes you need to send a GET request to the endpoint `/all.php`.
At the moment this endpoint returns all the recipes in the database.

### Update a recipe
To update a recipe you need to send a PUT request to the endpoint `/update.php` with the following body:
```json
{
    "Original": "Recipe name",
    "Plato": "New recipe name", 
    "Ingredientes": "New ingredients",
    "Pasos": "New Instructions"
}
```
At the moment this endpoint only allows you to update the name, ingredients and instructions of a recipe at the same time.  **This method does not support partial updates.**

### Delete a recipe
To delete a recipe you need to send a DELETE request to the endpoint `/delete.php` with the following body:
```json
{
    "Plato": "Recipe name"
}
```
At the moment this endpoint only allows you to delete a recipe by its name, and it will delete the whole recipe.  **The name of the recipe must be identical. `Plato` is case-sensitive.**