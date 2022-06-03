#The Task: Simple CRM System for Managing Clients
You should create an adminpanel-like system to manage Clients, Projects, Tasks with CRUD operations.
client
    client_id
    name
    email
    phone
    timestamps
    active

project
    project_id
    name
    description
    client_id
    started_at
    ended_at
    timestamps

task
    task_id
    name
    description
    project_id
    done
    due_date
    created_at
    updated_at
    timestamps

client_project
    client_id
    project_id

User can be related to client, task

user types :
    admin
    client


#Features to implement
Here's the list of Roadmap features you need to try to implement in your code:

##Routing Advanced
- [ ] Route Model Binding in Resource Controllers
- [ ] Route Redirect - homepage should automatically redirect to the login form

##Database Advanced
- [ ] Database Seeders and Factories - to automatically create first clients/projects/tasks and default users
- [ ] Eloquent Query Scopes - show only active clients, for example
- [ ] Polymorphic relationships with Spatie Media Library package
- [ ] Eloquent Accessors and Mutators - view all date values in m/d/Y format
- [ ] Soft Deletes on any Eloquent models

##Auth Advanced
- [ ] Authorization: Roles/Permissions (admin and simple users), Gates, Policies with Spatie Permissions package
- [ ] Authentication: Email Verification

##API Basics
- [ ] API Routes and Controllers
- [ ] API Eloquent Resources
- [ ] API Auth with Sanctum
- [ ] Override API Error Handling and Status Codes

##Debugging Errors
- [ ] Try-Catch and Laravel Exceptions
- [ ] Customizing Error Pages
##Sending Email

- [ ] Mailables and Mail Facade
- [ ] Notifications System: Email
##Extra

- [ ] Automated Tests for CRUD Operations
