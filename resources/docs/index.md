---
label: Introduction
priority: 1
source: https://github.com/caendesilva/OpenEvents/blob/master/resources/docs/index.md
---

# OpenEvents API Documentation

## Introduction

Welcome to OpenEvents! This is the documentation for the OpenEvents API and its integrations.

OpenEvents is an event-driven analytics platform. What this means in practice is that you decide
what data to collect and when you want to collect it.


## Getting started
> This is just a high-level overview. For more in-depth documentation, see the [getting started page](getting-started).

### Create an account and API token

To get started, you need to [create an account](/register).

Once you have an account, you need to create an API token on your [API dashboard](/user/api-tokens).

### Sending your first event

Events are created by sending a JSON request to your project API endpoint.
Here is an example object:
```json
{
  "event": "test_page_view", // A description key of the event
  "data": "https://example.com/about" // Optional arbitrary context data
}
```

### Viewing your events
You can see all your events on your [events dashboard](/explore).