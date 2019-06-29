---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://www.eric.com/_html/vendor/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## api/user
> Example request:

```bash
curl -X GET -G "http://www.eric.com/api/user" 
```
```javascript
const url = new URL("http://www.eric.com/api/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user`


<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->

<!-- START_229c53f9bf8d480e3d4f1e7117c1eac7 -->
## api/general/countries
> Example request:

```bash
curl -X GET -G "http://www.eric.com/api/general/countries" 
```
```javascript
const url = new URL("http://www.eric.com/api/general/countries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/general/countries`


<!-- END_229c53f9bf8d480e3d4f1e7117c1eac7 -->

<!-- START_5443c8dfff06d54f032d32db40720963 -->
## api/general/cities/{country_name}
> Example request:

```bash
curl -X GET -G "http://www.eric.com/api/general/cities/1" 
```
```javascript
const url = new URL("http://www.eric.com/api/general/cities/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/general/cities/{country_name}`


<!-- END_5443c8dfff06d54f032d32db40720963 -->


