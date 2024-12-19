<?php

// Read all by category
function checkReadAllByCategoryId($object)
{
    $query = $object->ReadAllByCategoryId();
    checkQuery($query, "Empty records. (read All)");
    return $query;
}

// Read active
function checkFilterActive($object)
{
    $query = $object->filterActive();
    checkQuery($query, "Empty records. (filter activee)");
    return $query;
}


// Read active search
function checkFilterActiveSearch($object)
{
    $query = $object->filterActiveSearch();
    checkQuery($query, "Empty records. (filter active search)");
    return $query;
}