# PHP Test task for implementing api without using dependencies

| uri                  |request                                     | method | response           | description                                  |
|----------------------|--------------------------------------------|--------|--------------------|----------------------------------------------|
| /user/login/         |["login"], ["pass"]                         | POST   | JSON message       | User authentication                          |
| /user/create/        |["login"], ["pass"], ["pass_2"], ["name"]   | POST   | JSON message       | User registration                            |
| /user/logout/:id     |id = user_id                                | GET    | JSON message       | User logout                                  |
| /recipe/             |["name"], ["desc"]                          | POST   | JSON message       | Create new recipe only authorized users      |
| /recipe/all/         |                                            | GET    | JSON all recipes   | Get all recipe                               |
| /recipe/single/:id   |id = recipe_id                              | GET    | JSON one recipe    | Get one recipe                               |
| /recipe/update/:id   |["name"], ["desc"], id = recipe_id          | PUT    | JSON message       | Update recipe info only for authorized users |
| /recipe/delete/:id   |id = recipe_id                              | DELETE | JSON message       | Delete recipe only for authorized users      |
| /image/create/:id    |$_FILES, id = image_id                      | POST   | JSON message       | Add row db and upload file to public/images  |
| /image/form/         |                                            | GET    | HTML form          | Html form for test file upload               |