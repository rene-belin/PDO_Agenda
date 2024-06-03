# Gestionnaire de Contacts - Application CRUD

Bienvenue dans ce projet de gestion de contacts, une application CRUD (Create, Read, Update, Delete) conçue pour démontrer les principes de base de la manipulation des données sans la sécurité des champs. Cette application est idéale pour les débutants souhaitant comprendre les fondements de la gestion des données dans une application web.
Introduction

Ce projet de gestion de contacts est une application simple qui permet aux utilisateurs de créer, lire, mettre à jour et supprimer des contacts. L'objectif principal est d'illustrer les opérations CRUD de base sans se concentrer sur les aspects de sécurité tels que la validation des champs ou la protection contre les attaques XSS/SQL injection.
Fonctionnalités

    Créer un nouveau contact avec un nom, un email et un numéro de téléphone.
    Lire la liste des contacts enregistrés.
    Mettre à jour les informations d'un contact existant.
    Supprimer un contact de la liste.

    Technologies Utilisées
    Frontend : HTML, CSS
    Base de Données : MySQL
    Outils : Git,
    #Utilisation
      ##Interface Utilisateur

    Créer un Contact : Remplissez le formulaire avec les informations du contact et cliquez sur "Ajouter".
    Lire les Contacts : La liste des contacts s'affichera automatiquement sur la page principale.
    Mettre à Jour un Contact : Cliquez sur le bouton "Modifier" à côté du contact que vous souhaitez mettre à jour, modifiez les informations et sauvegardez.
    Supprimer un Contact : Cliquez sur le bouton "Supprimer" à côté du contact que vous souhaitez supprimer.
    
    #API Endpoints

    GET /contacts : Récupère la liste des contacts.
    POST /contacts : Crée un nouveau contact.
    PUT /contacts/:id : Met à jour les informations d'un contact.
    DELETE /contacts/:id : Supprime un contact.
