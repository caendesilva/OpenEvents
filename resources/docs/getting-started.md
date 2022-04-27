---
priority: 2
---

# Getting started 

## Creating an account

To get started, you need to [create an account](/register).

As a way to keep the service simple during the initial development, accounts are in practice the same as projects.
In the future users will be able to have multiple projects in each account, but for now, if you want more than one project you need to create a new account for each project.

The name you supply during registration will be used as the name of your project and is public.
Your email stays private.


## Create an API token

Once you have an account, you need to create an API token on your [API dashboard](/user/api-tokens).

This is a secret key that you send in each API request as a bearer token to authenticate your requests.

You can create as many tokens as you'd like. You can set an arbitrary label for you to remember what the token is for.   Make sure to assign the permission `event:create` so it has permission to create events.

Remember to keep your API token secret!

## Next steps

You are now ready to start sending events to the API!

Learn how to do it in the next section, [dispatching your first event](dispatching-your-first-event).