#!/bin/bash

# Entrar como root
if [[ ${UID} -ne 0 ]]
then
    echo "No ets root"
    exit 1
fi

# PODEM TENIR UN O DOS PARÀMETRES
if [[ ${#} -eq 0 ]] || [[ ${#} -gt 2 ]]
then
    echo "Nombre incorrecte de paràmetres"
    echo "Ús: $0 [Y|N] USER_NAME"
    echo "O només: $0 USER_NAME"
    exit 1
fi

# Si tenim un paràmetre, només és el USER_NAME
if [[ ${#} -eq 1 ]]
then
    USER_NAME=${1}
    DELETE_HOME="N"
else
    # Si tenim dos paràmetres, el primer indica si esborrem el home
    DELETE_HOME=${1}
    USER_NAME=${2}
fi

# Verificar si l'usuari existeix
if id "${USER_NAME}" &>/dev/null; then
    if [[ ${DELETE_HOME} == "Y" ]]
    then
        # Esborrar usuari amb el seu home
        userdel -r ${USER_NAME}
        RESULT=$?
    else
        # Esborrar usuari sense esborrar el home
        userdel ${USER_NAME}
        RESULT=$?
    fi

    # Verificar si la comanda ha tingut èxit
    if [[ ${RESULT} -eq 0 ]]
    then
        echo "L'usuari ${USER_NAME} ha estat esborrat correctament."
    else
        echo "Hi ha hagut un error esborrant l'usuari ${USER_NAME}."
        exit 1
    fi
else
    echo "L'usuari ${USER_NAME} no existeix."
    exit 1
fi
