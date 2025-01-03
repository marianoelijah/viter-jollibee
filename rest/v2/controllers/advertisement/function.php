<?php

//Read active
function checkFilterActive($object)
{
    $query = $object->filterActive();
    checkQuery($query, "Empty records. (filter active)");
    return $query;
}

//Read active Search
function checkFilterActiveSearch($object)
{
    $query = $object->filterActiveSearch();
    checkQuery($query, "Empty records. (filter active search)");
    return $query;
}

//Read all active advertisement
function checkReadAllActiveAdvertisement($object)
{
    $query = $object->readAllActiveAdvertisement();
    checkQuery($query, "Empty records. (filter active advertisement)");
    return $query;
}