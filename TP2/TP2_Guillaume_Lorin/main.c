#include "mini_lib.h"

int main(){
    malloc_list.zone_alloue=NULL;// Exercice 8
    malloc_list.size_zone=0;
    malloc_list.statut=0;
    malloc_list.next_elem=NULL;

    void *zone1=mini_calloc(sizeof(int),5);
    printf("malloc list 0 : %d",malloc_list.statut);
    void *zone2=mini_calloc(sizeof(int),5);
    mini_free(zone2);
    void *zone3=mini_calloc(sizeof(int),4);
    printf("premier élément de la liste : %p\n",zone1);
    printf("deuxième élément de la liste : %p\nzone alloué elmt3 de la liste : %p\n",zone2, zone3);
    char *str="coucou comment ca va???";
    mini_printf(str);   
    MYFILE *myfile=mini_fopen("README.txt",'r');
    mini_fread(buf,sizeof(char),20,myfile);
    mini_fwrite(test, sizeof(char), 4, myfile);
    mini_fflush(myfile);
    mini_exit();
}