# [Readme](readme.md)

## Description

API rest de gestion d'articles

## Diagramme

```mermaid
classDiagram

class Item{
    string reference
    string logo
    integer provider_id
    integer brand_id
    text description
    text tech
}

class ItemRelated{
    string item_id
    text description
}

class Provider{
    string name
    string logo
    string address
    text description
}

class Brand{
    string name
    string logo
    text description
}

class Link{
    string name
    string link
}

class File{
    string name
    string folder
    string type
}


class Phone{
    string phone
}

class Email{
    string email
}

Item <-- Provider
Item <-- Brand
Item <-- File
Item <-- Link
Item <-- ItemRelated

Provider <-- Phone
Provider <-- Email

```
