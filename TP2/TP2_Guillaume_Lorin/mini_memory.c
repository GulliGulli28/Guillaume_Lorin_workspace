#include "mini_lib.h"


typedef struct malloc_element{
    void *zone_alloue;
    int taille_zone;
    int statut;
    void *next_malloc;
}malloc_element;

static malloc_element malloc_list={NULL, 0, 0, NULL};

void* mini_calloc(int size_element, int number_element){
    void* result;
    if (malloc_list.zone_alloue == NULL && malloc_list.next_malloc == NULL){ //On vérifie si la liste est vide
        malloc_list.zone_alloue =sbrk(size_element* number_element);
        void *buffer[size_element*number_element];
                for (int i=1;i<number_element;i++){
                    buffer[size_element*i]='\0';
                }
    }

    else{
        malloc_element *zone = &malloc_list;
        malloc_element *prevzone;
        bool stop = false;
        while (stop == false && zone != NULL){ //On parcourt la liste à la recherche d'une zone libre ayant une taille suffisement grande
            if (zone->statut == 0 && zone->taille_zone >= size_element*number_element ){
                zone->zone_alloue = sbrk(size_element*number_element);
                zone->statut =1;
                stop = true;
                void *buffer[size_element*number_element];
                for (int i=1;i<number_element;i++){
                    buffer[size_element*i]='\0';
                }
            }
            else{
                prevzone =zone;
                zone = zone->next_malloc;
                result =zone;

            }
        }
        if (stop ==false){ //si aucune zone ne correspond dans la liste, on créer alors une zone adéquate
            malloc_element new_malloc;
            prevzone->next_malloc = &new_malloc;
            new_malloc.zone_alloue = sbrk(size_element*number_element);
            new_malloc.statut = 1;
            new_malloc.taille_zone = size_element*number_element;
            void *buffer[size_element*number_element];
                for (int i=1;i<number_element;i++){
                    buffer[size_element*i]='\0';
                }
            result = &new_malloc;
        }
    }
    return result;

}

void mini_free(void* ptr){
    malloc_element *zone=&malloc_list;
    bool stop=false;
    while(zone!=NULL && stop==false){//On itère sur la liste pour chercher l'élement ptr
        if (zone->zone_alloue==ptr){
            zone->statut=0;
            stop=true;
        }
        zone=zone->next_malloc;
    }
}

void mini_exit(){
    char *str="\n";
    mini_printf(str);
    _exit(0);
}
