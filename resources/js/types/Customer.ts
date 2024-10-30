// resources/js/types/Customer.ts
export interface Customer {
    id: number;
    name: string;
    email: string;
    phone: string;
    address: {
        street: string;
        number: string;
        city: string;
        state: string;
        zip: string;
    };
}
