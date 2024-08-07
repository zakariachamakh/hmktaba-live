<template>
    <a-button
        v-if="permsArray.includes('mark_weekend_holiday') || permsArray.includes('admin')"
        type="primary"
        @click="openModel"
    >
        <PlusOutlined />
        {{ $t("holiday.mark_weekend_holiday") }}
    </a-button>

    <a-modal
        :open="visible"
        @ok="onSubmit"
        @close="closeModel"
        title="Mark Weekend Holiday"
        :closable="false"
    >
        <a-form layout="vertical">
            <a-row :gutter="16">
                <a-col :xs="24" :sm="24" :md="24" :lg="24">
                    <a-form-item :label="$t('holiday.mark_weekend_holiday')" name="name">
                        <a-checkbox-group
                            v-model:value="formData.name"
                            style="width: 100%"
                        >
                            <a-row>
                                <a-col
                                    :span="6"
                                    v-for="day in weekDays"
                                    :key="day.name"
                                    :value="day.name"
                                >
                                    <a-checkbox :value="day.name">{{
                                        day.name
                                    }}</a-checkbox>
                                </a-col>
                            </a-row>
                        </a-checkbox-group>
                        <div
                            v-if="rules && rules.name"
                            :style="{ color: 'red', marginTop: '5px' }"
                        >
                            <div class="ant-form-item-explain-error" style="">
                                {{ rules.name.message }}
                            </div>
                        </div>
                    </a-form-item>
                </a-col>
            </a-row>
            <a-row :gutter="16">
                <a-col :xs="24" :sm="24" :md="24" :lg="24">
                    <a-form-item
                        :label="$t('holiday.date')"
                        name="date"
                        :help="rules.date ? rules.date.message : null"
                        :validateStatus="rules.date ? 'error' : null"
                        class="required"
                    >
                        <a-range-picker
                            :format="appSetting.date_format"
                            valueFormat="YYYY-MM-DD"
                            v-model:value="formData.date"
                            :style="{ width: '100%' }"
                        />
                    </a-form-item>
                </a-col>
            </a-row>
            <a-row :gutter="16">
                <a-col :xs="24" :sm="24" :md="24" :lg="24">
                    <a-form-item
                        :label="$t('holiday.ocassion_name')"
                        name="ocassion_name"
                        :help="rules.ocassion_name ? rules.ocassion_name.message : null"
                        :validateStatus="rules.ocassion_name ? 'error' : null"
                        class="required"
                    >
                        <a-input
                            v-model:value="formData.ocassion_name"
                            :placeholder="
                                $t('common.placeholder_default_text', [
                                    $t('holiday.ocassion_name'),
                                ])
                            "
                        />
                    </a-form-item>
                </a-col>
            </a-row>
        </a-form>
        <template #footer>
            <a-button key="submit" type="primary" :loading="loading" @click="onSubmit">
                <template #icon>
                    <SaveOutlined />
                </template>
                {{ $t("common.create") }}
            </a-button>
            <a-button key="back" @click="closeModel">
                {{ $t("common.cancel") }}
            </a-button>
        </template>
    </a-modal>
</template>
<script>
import { defineComponent, ref } from "vue";
import { PlusOutlined, LoadingOutlined, SaveOutlined } from "@ant-design/icons-vue";
import apiAdmin from "../../../../../common/composable/apiAdmin";
import common from "../../../../../common/composable/common";
import hrmManagement from "../../../../../common/composable/hrmManagement";
import DateRangePicker from "../../../../../common/components/common/calendar/DateRangePicker.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
    emits: ["onSuccess"],
    components: {
        PlusOutlined,
        LoadingOutlined,
        SaveOutlined,
        DateRangePicker,
        hrmManagement,
    },
    setup(props, { emit }) {
        const { addEditRequestAdmin, loading, rules } = apiAdmin();
        const { appSetting, permsArray } = common();
        const { weekDays } = hrmManagement();
        const { t } = useI18n();

        const formData = ref({
            date: undefined,
            ocassion_name: "",
            name: [],
        });
        const visible = ref(false);

        const onSubmit = () => {
            addEditRequestAdmin({
                url: "mark-holidays?fields=name,ocassion_name,date_from,date_to",
                data: {
                    ...formData.value,
                    date_from: formData.value.date ? formData.value.date[0] : "",
                    date_to: formData.value.date ? formData.value.date[1] : "",
                },
                successMessage: t("holiday.weekend_marked_successfully"),
                success: (res) => {
                    emit("onSuccess");
                    visible.value = false;
                    formData.value = {};
                },
            });
        };

        const openModel = () => {
            visible.value = true;
        };

        const closeModel = () => {
            visible.value = false;
            rules.value = {};
            formData.value = {
                date: undefined,
                ocassion_name: "",
                name: [],
            };
        };

        return {
            onSubmit,
            rules,
            appSetting,
            permsArray,
            formData,
            visible,
            openModel,
            closeModel,
            loading,
            weekDays,
        };
    },
});
</script>
