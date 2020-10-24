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
[Get Postman Collection](http://127.0.0.1:8000/docs/collection.json)

<!-- END_INFO -->

#Auth


<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login

وب سرویس ورود

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"mobile":"veritatis"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "mobile": "veritatis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "type": "success",
    "message": "رمز عبور برای شما ارسال شد..."
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile` | is |  required  | 
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Register

ثبت نام

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"fname":"hic","lname":"saepe","mobile":"nulla"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "fname": "hic",
    "lname": "saepe",
    "mobile": "nulla"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User successfully created"
}
```

### HTTP Request
`POST api/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `fname` | is |  required  | 
        `lname` | is |  required  | 
        `mobile` | is |  required  | 
    
<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->

<!-- START_7e252a251ded29be2152d023e9ce3b6e -->
## Confirm Code

تایید رمز عبور

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"mobile":"et","password":"possimus"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "mobile": "et",
    "password": "possimus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOWRkZTg2MzFkMmEzYjgyZmI2MjRjZDBkMWQ4ZjkwODUxZTdmYzZmNmMzYmY5ZmEyNTI3ZmRhYjI4MDM2MGY5OTNlMWY0OGU4MDc3MzMzODIiLCJpYXQiOjE2MDMwNDc3OTYsIm5iZiI6MTYwMzA0Nzc5NiwiZXhwIjoxNjM0NTgzNzk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.J-WA9QUAVu1VurGLJ_QkIA3uw69jyUnkhWW9FXjcWcAMBGLGoPA4lscXFygaVecHqs5uYyq6KJOtart9MR_UvDEJhYm53hJLwuVcYROh8VvniJoFKIUOqnzeJMHpW2-mm05hW8l0deM_oAVfAe5iD8mnq7syRbsMLZ7WDLTPo8jZFBG8sf3cqaeNbWb5l0_YsRaB-1rJva8hZSvW30MHfyRdxyUCCzuXYwwW_VSTXBSoa6ijCsgFZipH8PkwdsQD-GoVyq4Gp9oK1Xx_HvBWVxTQUpguYIExMgC-HRbOKS6oy-CL3WjfoesUwevOibXprCy74MPsQnbsWIODCos1AB5Z0E-9JQpvVIfxf8-PMAh9H5tUTVmxDF5a7xmrK8n04M1vWxs9hicj3r_une9LPveRL7fW1gzbMKWQIkT5Ql8nCdGizVjXf9FEREr9WiBGE2sg9ioyPwyMAIfFTZJSSSdpDKx-rAAiDjgl1tmmmQ3jY1PjqwR-1xT4yNxevnrXCrGXj1ATH90KNb4hp1WC2aXBKGT-vmzeUXJPO8rndO57xRRNcinwG2LzEO87b61QfO4Q_xyQYMxyXLT69giOp1c6PsNUlOTSztbmMi1eK_Hlw7-HBSG4-6a2J8IxQCJyi8TeFF2kbihJ5SBpFpnOrDHThCdSkWopxNBzGhjc1XQ",
    "token_type": "Bearer"
}
```

### HTTP Request
`POST api/auth/confirm`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile` | is |  required  | 
        `password` | is |  required  | 
    
<!-- END_7e252a251ded29be2152d023e9ce3b6e -->

#general


<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
## api/logout
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/logout`


<!-- END_00e7e21641f05de650dbe13f242c6f2c -->

<!-- START_5e9be7a954f954ef60191a86eff340ce -->
## api/audiobooks/all
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/audiobooks/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/audiobooks/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/audiobooks/all`


<!-- END_5e9be7a954f954ef60191a86eff340ce -->

<!-- START_ed394450fbf9fbb2a371a892c8b4e353 -->
## api/audiobooks/{id}/soundfile
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/audiobooks/1/soundfile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/audiobooks/1/soundfile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/audiobooks/{id}/soundfile`


<!-- END_ed394450fbf9fbb2a371a892c8b4e353 -->

<!-- START_4b6a7dfe4090d1745dea985a37191db5 -->
## api/audiobooks/{id}/imagefile
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/audiobooks/1/imagefile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/audiobooks/1/imagefile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/audiobooks/{id}/imagefile`


<!-- END_4b6a7dfe4090d1745dea985a37191db5 -->

<!-- START_42cd3cd46c4e8ba3b13b987b80401b33 -->
## api/lectures/all
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/lectures/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/lectures/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/lectures/all`


<!-- END_42cd3cd46c4e8ba3b13b987b80401b33 -->

<!-- START_e45747ae35c413ddc5a8f520fd58e0e2 -->
## api/lectures/{id}/lecturefile
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/lectures/1/lecturefile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/lectures/1/lecturefile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/lectures/{id}/lecturefile`


<!-- END_e45747ae35c413ddc5a8f520fd58e0e2 -->

<!-- START_6435300907261485b265a02b875c628a -->
## api/lectures/{id}/imagefile
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/lectures/1/imagefile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/lectures/1/imagefile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/lectures/{id}/imagefile`


<!-- END_6435300907261485b265a02b875c628a -->

<!-- START_a73322c127563a54398af6ab4193f675 -->
## api/lecturers/all
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/lecturers/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/lecturers/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

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
`GET api/lecturers/all`


<!-- END_a73322c127563a54398af6ab4193f675 -->


