baseurl:
http://localhost:8000/api/

endpoints:

// User Register api

URI:
/register

Request Body:
{
    "email":"abc@domain.com",
    "password": 1234
}


Response:

{
    "user": {
        "id": 1,
        "email": "abc@domain.com"
    }
}



// User Login api

URI:
/login


Request Body:
{
    "email":"abc@domain.com",
    "password": 1234
}

Response:
{
    "jwt": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY3NTI0NjMzMSwiZXhwIjoxNjc1MjQ5OTMxLCJuYmYiOjE2NzUyNDYzMzEsImp0aSI6IkF5TUdmS2NGcTBKRFNnM28iLCJzdWIiOjUsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.-C1D0M6fo6nUKdGnIUguV531rNyvXn92e5TQoKBKinE"
}


//Get User api

URI:
/user


header:
    Accept : application/json,
    Authorization: Bearer Token


Response:

{
    "user": {
        "id": 1,
        "email": "abc@domain.com"
    }
}




// Create Task api

URI:
/create-task

header:
    Accept : application/json,
    Authorization: Bearer Token

Request Body:
{
    "name":"the first task"
}

Response:
{
    "task": {
        "id": 1,
        "name": "the first task"
    }
}



// List Task api

URI:
/list-task

header:
    Accept : application/json,
    Authorization: Bearer Token


Response:
{
    "task": {
        "id": 1,
        "name": "the first task"
    },
    {
        "id": 2,
        "name": "the second task"
    },
}

