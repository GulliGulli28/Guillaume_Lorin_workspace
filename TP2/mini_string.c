#include "mini_lib.h"

#define BUF_SIZE 1024
static char* buffer;
static int ind =-1;

void mini_printf(char* str){
    buffer=mini_calloc(sizeof(char),BUF_SIZE);
    if (ind ==-1){
        ind =0;
    }
    int i = 0;
    while (mini_strlen(str) > i){
        buffer[ind] = str[i];
        ind++;
        if (mini_strlen(buffer)==BUF_SIZE || buffer[ind-1]=='\n'){
            write(1,buffer, ind);
            ind =0;
            mini_free(buffer);
        }
        i++;
        

    }
    if (buffer != NULL){
        write(1,buffer,ind);
    }
}

int mini_scanf(char* buffer, int size_buffer){
    int i =0;
    while (buffer[i] != '\0' && i<= size_buffer){
        write(1,buffer, i);
        i++;
    }
    return i;
}

int mini_strlen(char* s){
    int i =0;
    while (s[i] != '\0'){
        i++;
    }
    i++;
    return i;
}

int mini_strcpy(char* s, char* d){
    int i =0;
    while (s[i]!='\0' ||d[i]!='\0'){
        d[i]=s[i];
        i++;

    }
    return i;
}

int mini_strcmp(char* s1, char* s2){
    int i =0;
    if (mini_strlen(s1)!= mini_strlen(s2)){
        i++;
    }
    else{
        for (int j=0;j<=strlen(s1); j++){
            if (s1[j]!=s2[j]){
                i++;
            }
        }
    }
    return i;
}

void mini_perror(char* message){
    mini_printf("Erreur : ");
    mini_printf(message);
    mini_printf("\numéro d'erreur : "); 
    mini_printf(itoa(errno));
    mini_printf("\n");

}

