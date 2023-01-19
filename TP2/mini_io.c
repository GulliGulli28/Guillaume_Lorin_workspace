#include "mini_lib.h"

typedef struct{
    int fd;
    void* buffer_read;
    void* buffer_write;
    int ind_read;
    int ind_write;
}MYFILE;

MYFILE mini_fopen(char* file, char mode){
    MYFILE *file_open = mini_calloc(sizeof(MYFILE),1);
    file_open->ind_read = -1;
    file_open->ind_write = -1;
    file_open->fd = open(file, mode);
    file_open->buffer_read = NULL;
    file_open->buffer_write = NULL;
    if (file_open->fd ==-1){
        mini_perror("Problème dans l'ouverture du fichier");
    }
    return *file_open;
}

int mini_fread(void* buffer, int size_element, int number_element,MYFILE* file){
    int i =0;
    if (file->fd == -1){
        file->buffer_read = mini_calloc(sizeof(char), IOBUFFER_SIZE);
        file->ind_read = 0;
    }
    else if (mini_strlen(file->buffer_read)> mini_strlen(buffer)){
        perror("buffer trop petit");
        return -1;
    }
    while (file->ind_read <= mini_strlen(file->buffer_read)){
        ((char*)buffer)[file->ind_read] = ((char*)file->buffer_read)[file->ind_read];
        file->ind_read ++;
        i++;
        
    }
    file->buffer_read = read(file->ind_read, buffer, size_element*number_element);
    return i-1;
}


int mini_fwrite(void* buffer, int size_element, int number_element, MYFILE *file){
    MYFILE file_open = mini_fopen(buffer, O_WRONLY);
    int i =0;
    if (file_open.fd == -1){
        return -1;
    }
    file_open.ind_write =0;
    while (file_open.fd <= mini_strlen(file->buffer_write)){
        file_open.buffer_write[file_open.ind_write]= buffer[file_open.ind_write];
        file_open.ind_write++;
        i++;
    }
    write(number_element, file_open.buffer_write);
    return i;
}

int mini_fflush(MYFILE* file){
    void buffer[2048];
    MYFILE file_open = mini_fopen(buffer, O_RDWR);
    int i =0;
    if (file_open.fd == -1){
        return -1;
    }
    while (file_open.buffer_write[i]!="\0"){
        buffer[i]=file_open.buffer_write[i];
        i++;
    }
    return i;    
}

int mini_fclose(MYFILE* file){
    int i = mini_fflush(file);
    
}