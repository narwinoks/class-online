module.exports = (sequelize, DataTypes) => {
  const MyCourses = sequelize.define(
    "MyCourses",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      profile: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      email: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      profession: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "my_courses",
      timestamps: true,
    }
  );
  return MyCourses;
};
